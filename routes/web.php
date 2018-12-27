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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('students', 'StudentController')->middleware('auth');

Route::get('/student/{student}', 'JiriStudentController@show')->middleware('auth');

Route::resource('jiri', 'JiriController')->middleware('auth');

Route::get('/score/{score}/edit', 'ScoreController@edit')->middleware('auth');

Route::resource('/impression', 'ImpressionController')->middleware('auth');

Route::post('/score', 'ScoreController@store')->middleware('auth');

Route::patch('/score/{score}', 'ScoreController@update')->middleware('auth');

Route::get('authenticated-user', 'AuthenticatedUserController@fetch');

Route::get('/student/{student}/project/{project}', 'ProjectController@show')->middleware('auth');

Route::get('/token/{token}', 'TokenController@checkToken');



