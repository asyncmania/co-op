<?php

use Illuminate\Support\Facades\Route;

Route::bind('ledger', function ($id) {
    return app(Modules\Ledgers\Repositories\LedgerInterface::class)->byId($id);
});

Route::group(['prefix' => 'ledgers'], function () {
    Route::get('/', [
        'as' => 'admin.ledgers.index',
        'uses' => 'LedgersController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.ledgers.create',
        'uses' => 'LedgersController@create'
    ]);
    Route::get('{ledger}/edit', [
        'as' => 'admin.ledgers.edit',
        'uses' => 'LedgersController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.ledgers.store',
        'uses' => 'LedgersController@store'
    ]);
    Route::put('{ledger}', [
        'as' => 'admin.ledgers.update',
        'uses' => 'LedgersController@update'
    ]);
    Route::get('data/table', [
        'as' => 'admin.ledgers.datatable',
        'uses' => 'LedgersController@dataTable'
    ]);
    Route::delete('{ledger}', [
        'as' => 'admin.ledgers.destroy',
        'uses' => 'LedgersController@destroy'
    ]);

    Route::post('bulk-upload', [
        'as' => 'admin.ledgers.bulk_upload',
        'uses' => 'LedgersController@bulkUpload'
    ]);
});
