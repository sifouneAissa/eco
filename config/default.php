<?php
return[
    'media' => [
            'product' => [
                'builder' => \App\Models\Product::class
            ]
    ],
    'permissions' => [
        'all' => [
            'view dashboard',
        ],
        'admin' => array_merge(
            [
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
                'add user',
                'add client',
                'edit client',
                'delete client',
                'view clients',
                'add product',
                'edit product',
                'delete product',
                'view products',
                'show product'
            ],
            mediaPermissions(\App\Models\Product::class,'product')
        ),
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
