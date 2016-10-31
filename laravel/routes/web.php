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

Route::get('/about', ['as' => 'about', function() {
    return view('about');
}]);

Route::post('/login', ['as' => 'login', 'uses' => 'UserController@authenticate']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

Route::group(['prefix' => 'account', 'middleware' => ['auth']], function() {
    
    Route::get('/dashboard', ['as' => 'dashboard', function() {
        return view('dashboard');
    }]);
});