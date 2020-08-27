<?php

return [
    'name' => 'Ledgers',
    'order' => [
        'id' => 'asc',
    ],
    'sidebar' => [
        'weight' => 10,
        'icon' => 'fa fa-table',
    ],
    'th' => ['Member', 'Start Date', 'End Date', 'Thrift Savings', 'Share Capital', 'Loan Balance', 'Loan Interest'],
    'columns' => [
        ['data' => 'member_name', 'name' => 'members.name'],
        ['data' => 'start_date', 'name' => 'start_date'],
        ['data' => 'end_date', 'name' => 'end_date'],
        ['data' => 'thrift_savings', 'name' => 'thrift_savings'],
        ['data' => 'share_capital', 'name' => 'share_capital'],
        ['data' => 'loan_balance', 'name' => 'loan_balance'],
        ['data' => 'loan_interest', 'name' => 'loan_interest'],
        ['data' => 'action', 'name' => 'action'],
    ],
    'form' => 'Ledgers\Forms\LedgersForm',
    'company_permissions' => [
        'ledgers' => [
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
