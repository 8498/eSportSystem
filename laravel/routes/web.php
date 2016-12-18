<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'welcome', 'uses' => 'PageController@welcome']);



// @TODO - replace ajax route

//Ajax
Route::get('/getroles', ['uses' => 'RoleController@ajaxGetAll']);

Route::get('/about', ['as' => 'about', 'uses' => 'PageController@about']);

Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

/* Account */
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function() {
    
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'UserController@dashboard']);

    /* Settings */
    Route::group(['prefix' => 'settings'], function() {
        
        Route::get('/', ['as' => 'settings', 'uses' => 'UserController@settings']);

        Route::post('/change-email', ['as' => 'change-email', 'uses' => 'UserController@changeEmail']);
        Route::post('/change-password', ['as' => 'change-password', 'uses' => 'UserController@changePassword']);

    });
    /* Users */
    Route::group(['prefix' => 'users', 'middleware' => ['role'], 'role' => 'superadmin'], function() {
        Route::get('/passwordreset/{id}',['as' => 'users.passwordreset', 'uses' => 'UserController@resetPassword']);

        Route::get('/', ['as' => 'users.view', 'uses' => 'UserController@view']);
        Route::get('/edit/{id}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
        
        Route::post('/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/edit',['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::get('/delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);          
    });
    
});
