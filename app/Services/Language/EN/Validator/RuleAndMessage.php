<?php

namespace App\Services\Language\EN\Validator;

class RuleAndMessage
{
    public $validator =  [
        //-------------------------------------------------------------------------------
        // Users Validator
        // ------------------------------------------------------------------------------
        'users' => [
            'rules' => [
                'name' => 'required',
                'username' => 'unique:users',
                // 'email' => 'unique:users',
            ],
            'messages' => [
                'name.required' => ':attribute must be filled',
                'username.required' => ':attribute must be filled',
                // 'email.required' => ':attribute must be filled',
            ]
        ],
        //-------------------------------------------------------------------------------
        // Roles Validator
        // ------------------------------------------------------------------------------
        'roles' => [
            'rules' => [
                'name' => 'required',
            ],
            'messages' => [
                'name.required' => ':attribute must be filled',
            ]
        ],
        //-------------------------------------------------------------------------------
        // Menus Validator
        // ------------------------------------------------------------------------------
        'menus' => [
            'rules' => [
                'name' => 'required',
                'link' => 'required',
                'path' => 'required',
                'icon' => 'required',
            ],
            'messages' => [
                'name.required' => ':attribute must be filled',
                'link.required' => ':attribute must be filled',
                'path.required' => ':attribute must be filled',
                'icon.required' => ':attribute must be filled',
            ]
        ],

        //-------------------------------------------------------------------------------
        // Master Menus Validator
        // ------------------------------------------------------------------------------
        'master_menus' => [
            'rules' => [
                'name' => 'required',
            ],
            'messages' => [
                'name.required' => ':attribute must be filled',
            ]
        ],
        //-------------------------------------------------------------------------------
        // Files
        // ------------------------------------------------------------------------------

        'files' => [
            'rules' => [],
            'messages' => []
        ],
        //-------------------------------------------------------------------------------
        // Permissions
        // ------------------------------------------------------------------------------

        'permissions' => [
            'rules' => [],
            'messages' => []
        ],
        'contacts' => [
            'rules' => [],
            'messages' => []
        ],


     




    ];
}
