<?php

return [
	'name' => 'Members',
	'order' => [
		'id' => 'asc',
	],
	'sidebar' => [
		'weight' => 2,
		'icon' => 'fa fa-file',
	],
	'th' => ['firstname','lastname','occupation','status'],
	'columns'=>[
            ['data'=>'firstname','name'=>'firstname'],
            ['data'=>'lastname','name'=>'lastname'],
            ['data'=>'occupation','name'=>'occupation'],
            ['data'=>'status','name'=>'status'],
            ['data'=>'action','name'=>'action'],
     ],
	'form'=>'Members\Forms\MembersForm',
	'permissions'=>[
		'members' => [
			'index',
			'create',
			'store',
			'edit',
			'update',
			'destroy',
		],
	]
];
