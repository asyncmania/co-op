<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('ledgers')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'ledgers', 'uses' => 'LedgersPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'ledgers.slug', 'uses' => 'LedgersPublicController@show']);
    }
}

/*Route::group(['prefix' => 'ledgers'], function()
{
    Route::get('/', 'LedgersPublicController@index');
});*/
