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
Route::get('students/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('students/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
Route::post('students/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('students/password/reset', 'StudentAuth\ResetPasswordController@reset');



Route::group(['middleware' => 'auth:web'], function() {
    Route::get('/home', 'HomeController@index');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('studentsubjects', 'StudentSubjectsController', ['except'=>'index']);
    Route::resource('users','UsersController');
    Route::resource('exams', 'ExamsController', ['except'=>['store', 'destroy']]);
    Route::get('students', 'StudentsController@index')->name('students.index');
    Route::get('students/create', 'StudentsController@create')->name('students.create');
    Route::get('studentsubjects/create/{users_id?}', 'StudentSubjectsController@create');
    Route::get('students/{student}/edit', 'StudentsController@edit');
    Route::delete('students/{student}', 'StudentsController@destroy')->name('students.destroy');
    Route::put('students/{student}', 'StudentsController@update')->name('students.update');
    Route::post('students', 'StudentsController@store')->name('students.store');
});

Route::group(['middleware' => 'auth:student'], function() {
    Route::get('students/home', 'StudentHomeController@index');
    Route::resource('studentsubjects', 'StudentSubjectsController', ['only'=>'index']);
    Route::resource('exams', 'ExamsController', ['only'=>['store', 'destroy']]);
});
