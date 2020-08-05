<?php

use Illuminate\Support\Facades\Route;

if ($page = \MyApp::getPageLinkedToModule('companies')) {
    $options = [];
    if ($uri = $page->uri) {
        Route::get($uri, $options + ['as' => 'companies', 'uses' => 'CompaniesPublicController@index']);
        Route::get($uri.'/{slug}', $options +  ['as' => 'companies.slug', 'uses' => 'CompaniesPublicController@show']);
    }
}

/*Route::group(['prefix' => 'companies'], function()
{
    Route::get('/', 'CompaniesPublicController@index');
});*/
