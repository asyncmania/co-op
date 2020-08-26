<?php

return [
    'name' => 'Cooperatives',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 2,
        'icon' => 'fa fa-briefcase',
    ],
    'th' => ['name', 'registration_number', 'type', 'email', 'phone'],
    'columns' => [
        ['data' => 'name', 'name' => 'name'],
        ['data' => 'registration_number', 'name' => 'registration number'],
        ['data' => 'type', 'name' => 'Type'],
        ['data' => 'email', 'name' => 'Email Address'],
        ['data' => 'phone', 'name' => 'Phone Number'],
        ['data' => 'action', 'name' => 'action'],
    ],
    'form' => 'Companies\Forms\CompaniesForm',
    'company_permissions' => [
        'companies' => [
            'index',
            'show',
            'edit_profile',
            'update_profile',
        ]
    ],
    'permissions' => [
        'companies' => [
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ],
    ]
];
