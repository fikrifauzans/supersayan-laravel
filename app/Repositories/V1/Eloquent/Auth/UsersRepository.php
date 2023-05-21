<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Repositories\V1\Eloquent\BaseRepository;
use App\Models\Otps;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Repositories\V1\Interface\Auth\IUsersRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;
use App\Services\Helper\Helper;
use App\Traits\QontakNotification as Notify;
use Carbon\Carbon;



class UsersRepository extends BaseRepository 
{
    use Notify;

    protected $model;

    public function __construct(Users $model)
    {
        $this->model = $model;
    }


    public function transformIndex($request, $relations)
    {
        if($request->has('list')) return $this->get($request, [ 'Class' , "School"] , [ 'Class' , "School"]);
        
        else return  $this->get($request, $relations , ['Role' , 'Class' , "School"]) ;

    }


    public function register($request)
    {
        $password = Helper::generateRandomString();

        $role = Roles::where('slug', 'jamaah')->first();

        $user = $this->model->create(['name' => $request->name, 'email' => $request->email, 'username' => $request->username, 'password' => Hash::make($password), 'is_customer' => 1, 'role_id' => $role->id]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return ['users' => $user, 'access_token' => $token, 'token_type' => 'Bearer'];
    }

    public function login($request)
    {
        $input = $request->all();

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {

            $user = $this->model->where('email', $input['username'])->orWhere('username', $input['username'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            $user =  $this->findId($user['id'], false, ['Role']);

            return ['users' => $user, 'token' => $token];
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
    }

    public function profile($request)
    {
        $user = Auth::user();

        if ($request['password']) $request['password'] = Hash::make($request['password']);

        if ($request->file('avatar') != null && $user['avatar_id'] ==  null) {

            $avatar =  $this->moveImage($request, 'avatar')->storeFile(null, 'Users', 'Foto Profil ' . $user['name']);

        $request->merge(['avatar_id' => $avatar['id']]);
        } else if ($request->file('avatar') != null && $user['avatar_id'] !=  null) {

            $this->updateFile($request['avatar_id'], $request, 'avatar');
        }

        return $this->updateOrCreate($user->id, $request->all());
    }

    public function me()
    {
        return Auth::user()->load(['Role', 'Avatar']);
    }

    public function forgot($request)
    {
        $user = $this->model->where('username', $request['username'])->first();

        $otp = $this->generateOtp($user['id'], $user['username'], 'forgot');

        return Otps::find($otp['id']);
    }

    public function checkingUser($request)
    {

        $user = $this->model->where('username', $request['username'])->first();

        if ($user != null)  return true;
    }

    public function generateOtp($user_id, $phone, $type)
    {
        $expired = Carbon::now()->addMinute(10);
        $otp     =  Helper::generateRandomNumber();
        $data    =  Otps::create([
            'expired' => $expired,
            'user_id' => $user_id,
            'name'    => $type,
            'phone'   => $phone,
            'status'  => 0,
            'otp'     => $otp,
        ]);

        Notify::forgotPassword(
            $data['otp'],
            [
                'phone' => $phone,
                'name' => $this->model
                    ->find($user_id)
                    ->name
            ]
        );
        return $data;
    }

    public function checkExpireOtp($request)
    {
        $status = false;
        $otp = Otps::where('phone', $request['phone'])
            ->where('expired', '>',  Carbon::now())
            ->latest()
            ->first();
        if ($otp != null && $otp->phone == $request['phone']) {
            $otp->update(['status' => 1]);
            $status = true;
        }
        return $status;
    }

    public function resetPasswordAndSendAuthToken($request)
    {

        $user = $this->model->where('email', $request['username'] ?? $request['phone'])->orWhere('username', $request['username'] ?? $request['phone'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $user =  $this->findId($user['id'], false, ['Role']);

        return ['users' => $user, 'token' => $token];
    }
}
