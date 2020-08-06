<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('members')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'members', 'uses' => 'MembersPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'members.slug', 'uses' => 'MembersPublicController@show']);
    }
}

/*Route::group(['prefix' => 'members'], function()
{
    Route::get('/', 'MembersPublicController@index');
});*/
