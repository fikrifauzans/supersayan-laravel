<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\V1\Auth\Controller;
use App\Repositories\V1\Eloquent\Auth\UsersRepository;
use Illuminate\Http\Request;

use App\Services\Handler\JsonResponse as JsonCustomResponse;
use App\Services\Validator\CustomValidator;
use App\Services\Helper\Helper;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $validator;
    public $response;
    public $repository;

    public function __construct(UsersRepository $repository, CustomValidator $validator, JsonCustomResponse $response)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->response = $response;
    }

    public function register(Request $request, $language)
    {

        $validated = $this->validator->validate($request, $language, $this->repository->getTableName());

        if ($validated->fails()) return response()->json(['errors' => $validated->errors()], 422);

        else return $this->response->choseLang($language)->modeMessage('create', $this->repository->getTableName())->success($this->repository->register($request));
    }

    public function login(Request $request, $language)
    {
        $input = $request->all();

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {

            return response()->json(["Message" => 'Login Failed'], 401);
        } else return $this->response->choseLang($language)->modeMessage('login', $this->repository->getTableName())->success($this->repository->login($request));
    }

    // method for user logout and delete token
    public function logout($language)
    {
        return $this->response->choseLang($language)->modeMessage('logout', $this->repository->getTableName())->success($this->repository->logout());
    }

    public function check()
    {
        if (!Auth::check()) return response()->json(['message' => 'unauthorized'], 401);

        else return response()->json(['data' => Auth::user(), 'message' => 'authorization'], 200);
    }

    public function profile(Request $request, $language)
    {
        return $this->response->choseLang($language)->modeMessage('update', $this->repository->getTableName())->success($this->repository->profile($request));
    }

    public function permission($auth, $param)
    {
        $permission = $auth->role->PermissionAccess()->whereHas("Permission", fn ($val) =>  $val->where('slug', $param))->first();

        return $permission != null;
    }

    public function edit(Request $request, $language)
    {

        $data = $request;

        $data  = (Helper::T_decodeRequest($data));

        return $this->repository->updateOrCreate(Auth::user()->id, $data->all(), []);
    }

    public function me($language)
    {
        return $this->response->choseLang($language)->modeMessage('me', $this->repository->getTableName())->success($this->repository->me());
    }

    public function forgot(Request $request, $language)
    {
        if ($this->repository->checkingUser($request)) return $this->response->choseLang($language)->modeMessage('me', $this->repository->getTableName())->success($this->repository->forgot($request));
    }

    public function verificationOtp(Request $request, $language)
    {
        if ($this->repository->checkExpireOtp($request)) return $this->response->choseLang($language)->modeMessage('me', 'otp')->success($this->repository->resetPasswordAndSendAuthToken($request));
    }
}

// where('expired', '>',  Carbon::now())
