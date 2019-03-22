<?php
Route::get('/', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();
    dd($users);
    return view('welcome');
})->name('welcome');
