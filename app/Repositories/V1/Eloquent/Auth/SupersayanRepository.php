<?php

namespace App\Repositories\V1\Eloquent\Auth;

use App\Models\Contents;
use App\Repositories\V1\Eloquent\BaseRepository;
use App\Models\Users;
use App\Models\Roles;
use App\Models\MasterMenus;
use App\Models\Menus;
use App\Models\MenuDetails;
use App\Models\PermissionAccess;
use App\Models\Permissions;
use GuzzleHttp\Promise\Create;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Hash;


class SupersayanRepository extends BaseRepository
{
    protected $users;
    protected $roles;
    protected $masterMenus;

    public function __construct(
        Users $users,
        Roles $roles,
        MasterMenus $masterMenus,
    ) {
        $this->users = $users;
        $this->roles = $roles;
        $this->masterMenus = $masterMenus;
    }


    public function init()
    {
        Users::insert([
            // 'id' => 1,
            [
                'name'          => 'Supersayan',
                'email'         => 'fikrifauzans.goku@gmail.com',
                'username'      => 'supersayan',
                'password'      => Hash::make('supersayan2118'),
                'role_id'       => 1
            ],

        ]);
        Roles::insert([
            ['name'  => 'Superadmin',         'slug' => 'master',              'master_menu_id' => 1   ],    //1
            ['name'  => 'Admin',              'slug' => 'admin',               'master_menu_id' => null] , //2
            ['name'  => 'Customer',           'slug' => 'customer',            'master_menu_id' => null] , //2
       

        ]);

        $menus = [
            ['name' => 'Dashboard',           'icon' => 'dashboard',                       'path' => 'dashboard',                    'link' => '/dashboard'],        //1
            ['name' => 'Management Accounts', 'icon' => 'manage_accounts',                 'path' => null,                           'link' => null],                //2
            ['name' => 'Users',               'icon' => 'person',                          'path' => 'users',                        'link' => '/users'],            //3
            ['name' => 'Menus',               'icon' => 'widgets',                         'path' => 'menus',                        'link' => '/menus'],            //5
            ['name' => 'Master Menus',        'icon' => 'menu_open',                       'path' => 'master-menus',                 'link' => '/master-menus'],     //6
            ['name' => 'Permissions',         'icon' => 'accessibility',                   'path' => 'permissions',                  'link' => '/permissions'],      //7
            ['name' => 'Roles',               'icon' => 'assignment_ind',                  'path' => 'roles',                        'link' => '/roles'],            //4
            ['name' => 'Master Data',         'icon' => 'source',                          'path' => null,                           'link' => null],                //8
            ['name' => 'Files',               'icon' => 'source',                          'path' => 'files',                        'link' => '/files'],            //9
            ['name' => 'CMS',                 'icon' => 'circle',                          'path' => null,                           'link' =>  null],               //10
            ['name' => 'Contents',            'icon' => 'circle',                          'path' => 'contents',                     'link' =>  '/contents'],         //11
          
        ];
        Menus::insert($menus);
        MasterMenus::insert(
            [
                ['name' => 'Superadmin',          'status' => 1], //1

            ]
        );

        $superadmin = [
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 1, 'sort' => 1], //'id' => 1,
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 2, 'sort' => 2], //'id' => 2,
            //Management Accounts ---------------------------------------------------------------/
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 3, 'sort' => 1], //'id' => 3, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 4, 'sort' => 2], //'id' => 4, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 5, 'sort' => 3], //'id' => 5, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 6, 'sort' => 4], //'id' => 6, //
            ['master_menu_id' => 1, 'parent_id' => 2,    'menu_id' => 7, 'sort' => 5], //'id' => 7, //
            //Master Data ------------------------------------------------------------------------/
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 8, 'sort' => 3], //'id' => 8,
            ['master_menu_id' => 1, 'parent_id' => 8,    'menu_id' => 9, 'sort' => 1], //'id' => 9, //
            ['master_menu_id' => 1, 'parent_id' => null, 'menu_id' => 10, 'sort' => 4], //'id' => 10, //
            ['master_menu_id' => 1, 'parent_id' => 10,   'menu_id' => 11, 'sort' => 1], //'id' => 11, //
        






        ];



        MenuDetails::insert($superadmin);


        //PERMISSIONS
        $permissionsInit = [
            ['name' => 'Dashboard',           'slug' => 'dashboard'],
            ['name' => 'Users',               'slug' => 'users'],
            ['name' => 'Roles',               'slug' => 'roles'],
            ['name' => 'Menus',               'slug' => 'menus'],
            ['name' => 'Master Menus',        'slug' => 'master-menus'],
            ['name' => 'Permissions',         'slug' => 'permissions'],
            ['name' => 'Permission Acess',    'slug' => 'permission-access'],
            ['name' => 'Files',               'slug' => 'files'],
            ['name' => 'Contents',            'slug' => 'contents'],
       
            // Master Data

        ];
        $permissions = [];

        foreach ($permissionsInit as $key => $permission) {
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Index',    'slug' =>  $permission['slug'] . '-index']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Show',     'slug' =>  $permission['slug'] . '-show']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Update',   'slug' =>  $permission['slug'] . '-update']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Store',    'slug' =>  $permission['slug'] . '-store']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Restore',  'slug' =>  $permission['slug'] . '-restore']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Delete',   'slug' =>  $permission['slug'] . '-destroy']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Force',    'slug' =>  $permission['slug'] . '-force']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Bin',      'slug' =>  $permission['slug'] . '-bin']));
            array_push($permissions, Permissions::create(['name' => $permission['name'] . '/Csv',      'slug' =>  $permission['slug'] . '-csv']));
        }
        // Tambahan
        // Permissions::create(['name' => 'Paket/Berangkat',       'slug' => 'packages-berangkat']);
        foreach ($permissions as $key => $access) {
            PermissionAccess::create(['permission_id' => $access['id'], 'role_id' => 1, 'status' => true]);
        }
    }

    public function getMaster()
    {
        $user = Users::with('Role')->get();
        Self::getContent();

        return $user;
    }
    public static function getContent()
    {
        /**
         * The attributes that are mass assignable.
         * @var code string 
         * @var parent_id integer 
         * @var group string 
         * @var name string 
         * @var page string 
         * @var device string 
         * @var title string 
         * @var subtitle string 
         * @var description string 
         * @var path string 
         * @var link string 
         * @var sort string 
         * @var remark text 
         * @var details text 
         * @var photo_id integer 
         */
    }
}
