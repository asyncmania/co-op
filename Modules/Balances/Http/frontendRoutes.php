<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('balances')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'balances', 'uses' => 'BalancesPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'balances.slug', 'uses' => 'BalancesPublicController@show']);
    }
}

/*Route::group(['prefix' => 'balances'], function()
{
    Route::get('/', 'BalancesPublicController@index');
});*/
