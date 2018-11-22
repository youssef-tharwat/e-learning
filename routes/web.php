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
    return view('index')->name('home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Teacher Auth
Route::prefix('teacher')->group(function(){
    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
    Route::get('/login', 'Auth\Teacher\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Auth\Teacher\TeacherLoginController@login')->name('teacher.login.submit');
    Route::get('/register', 'Auth\Teacher\TeacherRegisterController@showRegistrationForm')->name('teacher.registration');
    Route::post('/register', 'Auth\Teacher\TeacherRegisterController@register')->name('teacher.registration.submit');
});



