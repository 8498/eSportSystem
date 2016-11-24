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

Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'role'], 'role' => ['superadmin', 'administrator']],function() {

    Route::get('/', function() {
        dd('This is the Administration module index page. Build something great!');
    });

    //Ajax
    Route::get('/getoffices', ['uses' => 'OfficeController@ajaxGetAll']);

    /* Office */
    Route::group(['prefix' => 'offices'], function() {
        Route::get('/', ['as' => 'offices.view', 'uses' => 'OfficeController@view']);

        Route::get('/edit/{id}', ['as' => 'offices.edit', 'uses' => 'OfficeController@edit']);
        
        Route::post('/create', ['as' => 'offices.create', 'uses' => 'OfficeController@create']);
        Route::post('/edit',['as' => 'offices.update', 'uses' => 'OfficeController@update']);
        Route::get('/delete/{id}', ['as' => 'offices.delete', 'uses' => 'OfficeController@delete']);
    });

    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', ['as' => 'employees.view', 'uses' => 'EmployeeController@view']);
        Route::get('/show/{id}', ['as' => 'employees.show', 'uses' => 'EmployeeController@show']);

        Route::get('/edit/{id}', ['as' => 'employees.edit', 'uses' => 'EmployeeController@edit']);
        
        Route::post('/create', ['as' => 'employees.create', 'uses' => 'EmployeeController@create']);
        Route::post('/edit',['as' => 'employees.update', 'uses' => 'EmployeeController@update']);
        Route::get('/delete/{id}', ['as' => 'employees.delete', 'uses' => 'EmployeeController@delete']);
    });
});
