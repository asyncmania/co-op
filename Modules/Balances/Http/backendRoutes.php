<?php

use Illuminate\Support\Facades\Route;

Route::bind('balance', function ($id) {
    return app(Modules\Balances\Repositories\BalanceInterface::class)->byId($id);
});

Route::group(['prefix' => 'balances'], function () {
    Route::get('/', [
        'as' => 'admin.balances.index',
        'uses' => 'BalancesController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.balances.create',
        'uses' => 'BalancesController@create'
    ]);
    Route::get('{balance}/edit', [
        'as' => 'admin.balances.edit',
        'uses' => 'BalancesController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.balances.store',
        'uses' => 'BalancesController@store'
    ]);
    Route::put('{balance}', [
        'as' => 'admin.balances.update',
        'uses' => 'BalancesController@update'
    ]);
    Route::get('data/table', [
        'as' => 'admin.balances.datatable',
        'uses' => 'BalancesController@dataTable'
    ]);
    Route::delete('{balance}', [
        'as' => 'admin.balances.destroy',
        'uses' => 'BalancesController@destroy'
    ]);
    Route::post('bulk-upload', [
        'as' => 'admin.balances.bulk_upload',
        'uses' => 'BalancesController@bulkUpload'
    ]);
});
