<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'companies'], function()
{
    Route::get('/', 'CompaniesApiController@index');
});
