<?php

return [
    'name' => 'Member Contributions',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 12,
        'icon' => 'fa fa-file',
    ],
    'th' => ['Member', 'Contribution Date', 'Particulars', 'Type', 'Debit Amount', 'Credit Amount', 'Balance'],
    'columns' => [
        ['data' => 'member_name', 'name' => 'members.name'],
        ['data' => 'contribution_date', 'name' => 'contribution_date'],
        ['data' => 'particulars', 'name' => 'particulars'],
        ['data' => 'type', 'name' => 'type'],
        ['data' => 'debit_amount', 'name' => 'debit_amount'],
        ['data' => 'credit_amount', 'name' => 'credit_amount'],
        ['data' => 'balance', 'name' => 'balance'],
        ['data' => 'action', 'name' => 'action'],
    ],
    'form' => 'Contributions\Forms\ContributionsForm',
    'company_permissions' => [
        'contributions' => [
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
