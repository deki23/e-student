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
    //Route::resource('students','StudentsController');
    //Route::get('students/{student}', 'StudentsController@show')->name('students.show');
    //Route::resource('subjects', 'SubjectsController');
    //Route::get('subjects/create/{users_id?}', 'SubjectsController@create');
    Route::get('students', 'StudentsController@index')->name('students.index');
    Route::get('/exams', 'ExamsController@index')->name('exams.index');
    Route::get('students/create', 'StudentsController@create')->name('students.create');
    Route::get('subjects/create', 'SubjectsController@create')->name('subjects.create');
    Route::get('studentsubjects/create', 'StudentSubjectsController@create')->name('studentsubjects.create');
    Route::get('subjects', 'SubjectsController@index')->name('subjects.index');
    Route::get('studentsubjects/create/{users_id?}', 'StudentSubjectsController@create');


    Route::get('subjects/{student}', 'SubjectsController@show')->name('subjects.show');
    Route::delete('students/{student}', 'StudentsController@destroy')->name('students.destroy');
    Route::delete('subject/{student}', 'StudentSubjectsController@destroy')->name('studentsubjects.destroy');

    Route::get('students/{student}/edit', 'StudentsController@edit');
    Route::get('studentsubjects/{subject}/edit', 'StudentSubjectsController@edit');
    Route::put('students/{student}', 'StudentsController@update')->name('students.update');
    Route::put('studentsubjects/{student}', 'StudentSubjectsController@update')->name('studentsubjects.update');
    Route::post('students', 'StudentsController@store')->name('students.store');
    Route::post('subjects', 'SubjectsController@store')->name('subjects.store');
    Route::post('studentsubjects', 'StudentSubjectsController@store')->name('studentsubjects.store');
    Route::resource('users','UsersController');

});


Route::group(['middleware' => 'auth:student'], function() {
    Route::get('students/home', 'StudentHomeController@index');
    Route::get('studentsubjects', 'StudentSubjectsController@index')->name('studentsubjects.index');
    Route::post('exams', 'ExamsController@store')->name('exams.store');
    Route::delete('exams/{exam}', 'ExamsController@destroy')->name('exams.destroy');

});
