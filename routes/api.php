<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('jiri', 'Api\AdminJiriController')->middleware('auth:api');
Route::get('/getcurrentjiri', 'Api\AdminJiriController@lastcreatedjiri')->middleware('auth:api');
Route::resource('projects', 'Api\AdminProjectsController')->middleware('auth:api');
Route::resource('dashboard', 'Api\AdminDashboardController')->middleware('auth:api');
Route::resource('users', 'Api\AdminUsersController')->middleware('auth:api');
Route::resource('students', 'Api\AdminStudentsController')->middleware('auth:api');
Route::resource('groupe', 'Api\AdminGroupeController')->middleware('auth:api');
//Route::middleware('auth:api')->resource('jiri', 'Api\AdminJiriController');
