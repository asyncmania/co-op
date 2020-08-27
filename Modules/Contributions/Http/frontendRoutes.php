<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('contributions')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'contributions', 'uses' => 'ContributionsPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'contributions.slug', 'uses' => 'ContributionsPublicController@show']);
    }
}

/*Route::group(['prefix' => 'contributions'], function()
{
    Route::get('/', 'ContributionsPublicController@index');
});*/
