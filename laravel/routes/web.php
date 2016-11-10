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

Route::get('/', ['as' => 'welcome', function () {
    return view('welcome');
}]);

//Ajax
Route::get('/getroles', ['uses' => 'RoleController@ajaxGetAll']);

Route::get('/about', ['as' => 'about', function() {
    return view('about');
}]);

Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

/* Account */
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function() {
    
    Route::get('/dashboard', ['as' => 'dashboard', function() {
        return view('dashboard');
    }]);

    /* Settings */
    Route::group(['prefix' => 'settings'], function() {
        
        Route::get('/', ['as' => 'settings', function() {
            return view('account.settings.index');
        }]);

        Route::post('/change-email', ['as' => 'change-email', 'uses' => 'UserController@changeEmail']);
        Route::post('/change-password', ['as' => 'change-password', 'uses' => 'UserController@changePassword']);

    });
    /* Users */
    Route::group(['prefix' => 'users', 'middleware' => ['role:superadmin']], function() {
        Route::get('/', ['as' => 'users.view', 'uses' => 'UserController@view']);
        Route::get('/edit/{id}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
        
        Route::post('/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/edit',['as' => 'users.update', 'uses' => 'UserController@update']);
        Route::get('/delete/{id}', ['as' => 'users.delete', 'uses' => 'UserController@delete']);          
    });
    
});
