<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|
|   Authentication Routes [Login, Password Reset]
|
 */



Route::group(['namespace' => 'Auth',
        'middleware'    =>  ['guest']
    ], function(){
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/', 'LoginController@post');
});

/*
|
|   Auth Routes
|
 */
Route::group(['middleware' => 'auth'], function()
{
    /*
     * Owner Specific Routes
     */
    Route::group(['middleware'  =>  ['role:owner']], function() {
        Route::get('/home', 'HomeController@ownerDashboard')->name('home');

        Route::resource('/roles', 'RolesController');
        Route::resource('/skills', 'SkillsController');


        Route::resource('/users', 'UsersController');

        Route::resource('/projects', 'ProjectController', ['except' => ['show']]);
        Route::get('/projects/{project}', 'ProjectController@show');

        Route::resource('/tasks', 'TaskController',  ['except' => ['show']]);
        Route::get('/tasks/{task}', 'TaskController@show');
        Route::post('/tasks/{task}', 'TaskController@addUser');

    });

    /*
     * General Logged in user routes
     */
});