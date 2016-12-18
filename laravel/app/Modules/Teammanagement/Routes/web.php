<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'teammanagement', 'middleware' => ['auth', 'role'], 'role' => ['superadmin', 'manager']], function() {

    /* Game */
    Route::group(['prefix' => 'games'], function() {
        Route::get('/', ['as' => 'games.view', 'uses' => 'GameController@view']);

        Route::get('/edit/{id}', ['as' => 'games.edit', 'uses' => 'GameController@edit']);

        Route::post('/create', ['as' => 'games.create', 'uses' => 'GameController@create']);
        Route::post('/edit',['as' => 'games.update', 'uses' => 'GameController@update']);
        Route::get('/delete/{id}', ['as' => 'games.delete', 'uses' => 'GameController@delete']);
    });

    Route::group(['prefix' => 'teams'], function() {
        Route::get('/', ['as' => 'teams.view', 'uses' => 'TeamController@view']);
        Route::get('/show/{id}', ['as' => 'teams.show', 'uses' => 'TeamController@show']);

        Route::get('/edit/{id}', ['as' => 'teams.edit', 'uses' => 'TeamController@edit']);

        Route::post('/create', ['as' => 'teams.create', 'uses' => 'TeamController@create']);
        Route::post('/edit',['as' => 'teams.update', 'uses' => 'TeamController@update']);
        Route::get('/delete/{id}', ['as' => 'teams.delete', 'uses' => 'TeamController@delete']);
        
        Route::post('/addGame', ['as' => 'teams.add-game', 'uses' => 'TeamController@addGame']);
        Route::post('/removeGame', ['as' => 'teams.remove-game', 'uses' => 'TeamController@removeGame']);
    });

    Route::group(['prefix' => 'players'], function() {
        Route::get('/{status}', ['as' => 'players.view', 'uses' => 'PlayerController@view']);
        
        Route::get('/show/{id}', ['as' => 'players.show', 'uses' => 'PlayerController@show']);

        Route::get('/edit/{id}', ['as' => 'players.edit', 'uses' => 'PlayerController@edit']);

        Route::post('/create', ['as' => 'players.create', 'uses' => 'PlayerController@create']);
        Route::post('/edit',['as' => 'players.update', 'uses' => 'PlayerController@update']);
        Route::get('/delete/{id}', ['as' => 'players.delete', 'uses' => 'PlayerController@delete']);
        
        Route::post('/addGame', ['as' => 'players.add-game', 'uses' => 'PlayerController@addGame']);
        Route::post('/removeGame', ['as' => 'players.remove-game', 'uses' => 'PlayerController@removeGame']);

        Route::post('/addTeam', ['as' => 'players.add-team', 'uses' => 'PlayerController@addToTeam']);
        Route::post('/removeTeam', ['as' => 'players.remove-team', 'uses' => 'PlayerController@removeFromTeam']);

        Route::get('/setAsPlayer/{id}', ['as' => 'players.set-as-player', 'uses' => 'PlayerController@changeStatusToPlayer']);
        Route::get('/setAsCandidate/{id}', ['as' => 'players.set-as-candidate', 'uses' => 'PlayerController@changeStatusToCandidate']);
    });

});
