<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ledgers'], function()
{
    Route::get('/', 'LedgersApiController@index');
});
