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
Route::get('students/login', 'StudentAuth\LoginController@showLoginForm');
Route::post('students/login', 'StudentAuth\LoginController@login');
Route::post('students/logout', 'StudentAuth\LoginController@logout');
Route::post('students/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('students/password/reset', 'StudentAuth\ResetPasswordController@reset');
Route::get('students/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('students/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');

Route::group(['middleware' => 'auth:web'], function() {
    Route::get('/home', 'HomeController@index');
    //Route::resource('students','StudentsController');
    Route::get('students', 'StudentsController@index')->name('students.index');
    Route::get('students/create', 'StudentsController@create')->name('students.create');
    Route::get('subjects/create', 'SubjectsController@create')->name('subjects.create');
    Route::get('subjects/create/{users_id?}', 'SubjectsController@create');
    //Route::get('students/{student}', 'StudentsController@show')->name('students.show');
    Route::get('subjects/{student}', 'SubjectsController@show')->name('subjects.show');
    Route::delete('students/{student}', 'StudentsController@destroy')->name('students.destroy');
    Route::get('students/{student}/edit', 'StudentsController@edit');
    Route::put('students/{student}', 'StudentsController@update')->name('students.update');
    Route::post('students', 'StudentsController@store')->name('students.store');
    Route::post('subjects', 'SubjectsController@store')->name('subjects.store');
    //Route::resource('subjects', 'SubjectsController');
    Route::resource('users','UsersController');

});


Route::group(['middleware' => 'auth:student'], function() {
    Route::get('students/home', 'StudentHomeController@index');
    Route::get('subjects', 'SubjectsController@index');
});
