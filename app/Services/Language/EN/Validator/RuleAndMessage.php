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
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
            ],
            'messages' => [
                'name.required' => ':attribute must be filled',
                'username.required' => ':attribute must be filled',
                'email.required' => ':attribute must be filled',
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


        //////////////////////////////////MASTER DATA//////////////////////////////////
        //-------------------------------------------------------------------------------
        // Categories
        // ------------------------------------------------------------------------------

        'categories' => [
            'rules' => ['name' => 'required',],
            'messages' => ['name.required' => ':attribute must be filled',]
        ],
        'package_services' => [
            'rules' => ['name' => 'required',],
            'messages' => ['name.required' => ':attribute must be filled',]
        ],

        //-------------------------------------------------------------------------------
        // Airports
        // ------------------------------------------------------------------------------

        'airports' => [
            'rules' => ['name' => 'required',],
            'messages' => ['name.required' => ':attribute must be filled',]
        ],

        //////////////////////////////////Transaction//////////////////////////////////
        'inventories' => [
            'rules' => ['name' => 'required',],
            'messages' => ['name.required' => ':attribute must be filled',]
        ],
        'packages' => [
            'rules' => [],
            'messages' => []
        ],

        'data_diri_transactions' => [
            'rules' => ['name' => 'required',],
            'messages' => ['name.required' => ':attribute must be filled',]
        ],

        'booking_packs' => [
            'rules' => [],
            'messages' => []
        ],
        'transactions' => [
            'rules' => [],
            'messages' => []
        ],
        'transaction_details' => [
            'rules' => [],
            'messages' => []
        ],
        'transaction_payments' => [
            'rules' => [],
            'messages' => []
        ],
        'inventori_categories' => [
            'rules' => [],
            'messages' => []
        ],




    ];
}
