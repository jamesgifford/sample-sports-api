<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::apiResources([
        'teams' => 'Api\TeamController',
        'players' => 'Api\PlayerController'
    ]);
    Route::get('/teams/{team}/players', 'Api\TeamController@showWithPlayers')->name('teamWithPlayers');
});

