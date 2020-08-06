<?php

return [
	'name' => 'Companies',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-briefcase',
	],
	'th' => ['name','registration_number','contact_details','status'],
	'columns'=>[
						['data'=>'name','name'=>'name'],
						['data'=>'registration_number','name'=>'registration number'],
						['data'=>'contact_details','name'=>'contact details'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Companies\Forms\CompaniesForm',
	'permissions'=>[
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
