<?php

use Illuminate\Support\Facades\Route;

Route::bind('member', function ($id) {
    return app(Modules\Members\Repositories\MemberInterface::class)->byId($id);
});

Route::group(['prefix' => 'members'], function () {
    Route::get('/', [
        'as' => 'admin.members.index',
        'uses' => 'MembersController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.members.create',
        'uses' => 'MembersController@create'
    ]);
    Route::get('{member}/edit', [
        'as' => 'admin.members.edit',
        'uses' => 'MembersController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.members.store',
        'uses' => 'MembersController@store'
    ]);
    Route::put('{member}', [
        'as' => 'admin.members.update',
        'uses' => 'MembersController@update'
    ]);
    Route::get('data/table', [
        'as' => 'admin.members.datatable',
        'uses' => 'MembersController@dataTable'
    ]);
    Route::delete('{member}', [
        'as' => 'admin.members.destroy',
        'uses' => 'MembersController@destroy'
    ]);

    Route::get('show/{member}', [
        'as' => 'admin.members.show',
        'uses' => 'MembersController@show'
    ]);
});
