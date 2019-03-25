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
/*Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('web')->user();
    return view('home');
})->name('home');*/
  Route::get('students/home', 'StudentHomeController@index');
Route::get('students/login', 'StudentAuth\LoginController@showLoginForm');
Route::post('students/login', 'StudentAuth\LoginController@login');
Route::post('students/logout', 'StudentAuth\LoginController@logout');
Route::post('students/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('students/password/reset', 'StudentAuth\ResetPasswordController@reset');
Route::get('students/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('students/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');

Route::group(['middleware' => 'auth:web'], function() {
  //  Route::get('/home', 'HomeController@index');
    Route::resource('students','StudentsController');
    //Route::resource('subjects', 'SubjectsController');
    Route::resource('users','UsersController');
    Route::get('subjects/create/{users_id?}', 'SubjectsController@create');
});


Route::group(['middleware' => 'auth:student'], function() {
    Route::get('students/home', 'StudentHomeController@index');
    Route::get('subjects', 'SubjectsController@index');


});
