<?php

return [
    'name' => 'Members',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 2,
        'icon' => 'fa fa-user-friends',
    ],
    'th' => ['name', 'email', 'phone'],
    'columns' => [
        ['data' => 'name', 'name' => 'name'],
        ['data' => 'email', 'name' => 'email'],
        ['data' => 'phone', 'name' => 'phone'],
        ['data' => 'action', 'name' => 'action'],
    ],
    'form' => 'Members\Forms\MembersForm',
    'company_permissions' => [
        'members' => [
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
            'bulk_upload',
        ],
    ]
];
