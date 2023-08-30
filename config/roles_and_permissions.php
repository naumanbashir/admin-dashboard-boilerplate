<?php

/**
 * In the module array add all of your Application Modules
 * In role_permissions array, Add All the roles in your applications and add permission initials for each module
 */

return [
    'modules' => [
        'products' => ['c', 'r', 'u', 'd'],
        'orders' => ['c', 'r', 'u', 'd'],
        'categories' => ['c', 'r', 'u', 'd'],
    ],
    'role_permissions' => [
        'manager' => [
            'products' => [
                'permissions' => ['r', 'u'],
                'description' => 'Products'
            ],
            'orders' => [
                'permissions' => ['r', 'u'],
                'description' => 'Orders'
            ],
            'categories' => [
                'permissions' => ['r', 'u'],
                'description' => 'Purchase Orders'
            ],
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
