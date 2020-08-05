<?php

use Illuminate\Support\Facades\Route;

Route::bind('company', function ($id) {
    return app(Modules\Companies\Repositories\CompanyInterface::class)->byId($id);
});

Route::group(['prefix' => 'companies'], function () {
    Route::get('/', [
        'as' => 'admin.companies.index',
        'uses' => 'CompaniesController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.companies.create',
        'uses' => 'CompaniesController@create'
    ]);
    Route::get('{company}/edit', [
        'as' => 'admin.companies.edit',
        'uses' => 'CompaniesController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.companies.store',
        'uses' => 'CompaniesController@store'
    ]);
    Route::put('{company}', [
        'as' => 'admin.companies.update',
        'uses' => 'CompaniesController@update'
    ]);
    Route::get('data/table', [
        'as' => 'admin.companies.datatable',
        'uses' => 'CompaniesController@dataTable'
    ]);
    Route::delete('{company}', [
        'as' => 'admin.companies.destroy',
        'uses' => 'CompaniesController@destroy'
    ]);
});
