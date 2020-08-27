<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'balances'], function()
{
    Route::get('/', 'BalancesApiController@index');
});
