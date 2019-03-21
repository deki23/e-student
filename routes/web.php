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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('students','StudentsController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('users','UsersController');
    Route::get('subjects/create/{user_id?}', 'SubjectsController@create');
});


Route::group(['middleware' => 'auth:students'], function() {
    Route::resource('users','UsersController');
});
