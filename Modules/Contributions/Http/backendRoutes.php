<?php

use Illuminate\Support\Facades\Route;

Route::bind('contribution', function ($id) {
    return app(Modules\Contributions\Repositories\ContributionInterface::class)->byId($id);
});

Route::group(['prefix' => 'contributions'], function () {
    Route::get('/', [
        'as' => 'admin.contributions.index',
        'uses' => 'ContributionsController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.contributions.create',
        'uses' => 'ContributionsController@create'
    ]);
    Route::get('{contribution}/edit', [
        'as' => 'admin.contributions.edit',
        'uses' => 'ContributionsController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.contributions.store',
        'uses' => 'ContributionsController@store'
    ]);
    Route::put('{contribution}', [
        'as' => 'admin.contributions.update',
        'uses' => 'ContributionsController@update'
    ]);
    Route::get('data/table', [
        'as' => 'admin.contributions.datatable',
        'uses' => 'ContributionsController@dataTable'
    ]);
    Route::delete('{contribution}', [
        'as' => 'admin.contributions.destroy',
        'uses' => 'ContributionsController@destroy'
    ]);
    Route::post('bulk-upload', [
        'as' => 'admin.contributions.bulk_upload',
        'uses' => 'ContributionsController@bulkUpload'
    ]);
});
