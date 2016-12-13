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
    });

    Route::get('/edit/{id}', ['as' => 'games.edit', 'uses' => 'GameController@edit']);

    Route::post('/create', ['as' => 'games.create', 'uses' => 'GameController@create']);
    Route::post('/edit',['as' => 'games.update', 'uses' => 'GameController@update']);
    Route::get('/delete/{id}', ['as' => 'games.delete', 'uses' => 'GameController@delete']);
});
