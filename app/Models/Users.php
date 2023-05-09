<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Users extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $table =  'users';

  protected $casts  = [
    'role_id'             => 'integer',
    'is_customer'         => 'integer',
    'avatar_id'         => 'integer',

  ];

  protected $fillable = [
    'name',
    'email',
    'username',
    'address',
    'password',
    'role_id',
    'phone',
    'is_customer',
    'avatar_id'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var string[]
   */


  protected $hidden = [
    'password',
  ];

  public $searchable = [
    'name',
    'email',
    'username',
    'address',
    'password',
    'role_id',
    'phone',
    'is_customer',
    'avatar_id'
  ];


  public function Role()
  {
    return $this->belongsTo(Roles::class, 'role_id', 'id')->with(['MasterMenu']);
  }


  public function Bookings()
  {
    return $this->hasMany(BookingPackages::class, 'user_id', 'id');
  }


  public function Avatar()
  {
    return $this->belongsTo(Files::class, 'avatar_id', 'id');
  }

  public function Otp()
  {
    return $this->hasMany(Otps::class, 'phone', 'username');
  }
}
