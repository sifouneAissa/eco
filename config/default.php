<?php
return[
    'media' => [
            'product' => [
                'builder' => \App\Models\Product::class
            ],
            'setting' => [
                'builder' => \App\Models\Setting::class
            ]
    ],
    'orders' => [
        'user' => [
            // key in products table
            'origin_key' => 'id',
            // key in orders table
            'key' => 'user_id',
            'builder' => \App\Models\User::class
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
                'add setting',
                'edit setting',
                'show setting',
                'delete setting',
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
                'show product',
                'edit order',
                'add order',
                'show order',
                'view orders',
                'delete order',
                'add blog',
                'delete blog',
                'show blog',
                'view blogs',
                'edit blog',
                'update order status',
                'view user orders'
            ],
            mediaPermissions(\App\Models\Product::class,'product'),
            mediaPermissions(\App\Models\Setting::class,'setting')
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
