<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PermissionAccess;


class Roles extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table =  'roles';


    protected $casts = [
        'master_menu_id'         => 'integer',
    ];

    protected $fillable = [
        'name', 'status', 'master_menu_id', 'slug'
    ];


    protected $hidden = [];

    public $searchable = [
        'name', 'status', 'master_menu_id', 'slug'
    ];
    protected $appends = [
        'permission_access_index'
    ];


    public function MasterMenu()
    {
        return $this->belongsTo(MasterMenus::class, 'master_menu_id', 'id')->with('MenuDetails');
    }

    public function getPermissionAccessIndexAttribute()
    {
        $permissionAccess = [];
        $permissions = $this->hasMany(PermissionAccess::class, 'role_id')->with('Permission')->get()->toArray();
        foreach ($permissions as $key => $value) {
            $permissionAccess[] = $value['permission']['slug'];
        }
        return $permissionAccess;
    }

    /**
     * Get all of the comments for the Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PermissionAccess()
    {
        return $this->hasMany(PermissionAccess::class, 'role_id')->with('Permission');
    }
}
