<?php
use \Illuminate\Support\Facades\Hash;
return[

    'permissions' => [
        'all' => [
            'view dashboard',
        ],
        'admin' => [
            'view settings',
            'view roles',
            'edit role',
            'show role',
            'delete role',
            'view permissions',
            'show user',
            'edit user',
            'delete user',
            'view users',
            'add role',
            'add user'
        ],
        'publisher' => [

        ]
    ],
    'roles' => [
        'admin' => [
            // give this roles to this emails
            'admin@demo.com'
        ],
        'publisher' => [
            'publisher@demo.com'
        ]
    ],
    // Password = password
    'users' => [
        [
            'name' => 'admin admin',
            'email' => 'admin@demo.com',
            'is_admin' => true,
            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
        ],
        [
            'name' => 'publisher',
            'email' => 'publisher@demo.com',
            'is_admin' => true,
            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
        ]
    ]
];
