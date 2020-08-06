<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'members'], function()
{
    Route::get('/', 'MembersApiController@index');
});
