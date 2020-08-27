<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'contributions'], function()
{
    Route::get('/', 'ContributionsApiController@index');
});
