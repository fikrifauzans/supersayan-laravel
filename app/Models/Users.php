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
    'avatar_id',
    'school_id',
    'class_id'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var string[]
   */


  protected $hidden = [
    'password',
  ];

  protected $appens = ['RoleName'];

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


  public function School()
  {
    return $this->belongsTo(Schools::class, 'school_id', 'id');
  }

  public function Class()
  {
    return $this->belongsTo(Classes::class, 'class_id', 'id');
  }


  public function Avatar()
  {
    return $this->belongsTo(Files::class, 'avatar_id', 'id');
  }

  public function getRoleNameAttribute()
  {
    $role = Roles::find($this->role_id, 'id');
    return $role->name;
  }
}
