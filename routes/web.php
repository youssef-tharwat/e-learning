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
    return view('index');
});

Auth::routes();
Route::get('/dashboard', 'UserController@index')->name('user.dashboard');

// Teacher 
Route::prefix('teacher')->group(function(){
    Route::get('/dashboard', 'TeacherController@index')->name('teacher.dashboard');
    
    // Auth
    Route::get('/login', 'Auth\Teacher\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Auth\Teacher\TeacherLoginController@login')->name('teacher.login.submit');
    Route::get('/register', 'Auth\Teacher\TeacherRegisterController@showRegistrationForm')->name('teacher.registration');
    Route::post('/register', 'Auth\Teacher\TeacherRegisterController@register')->name('teacher.registration.submit');
    Route::post('/student/register', 'Auth\Teacher\UserRegisterController@studentRegister')->name('teacher.student.registration.submit');
});

// Testing 

Route::get('/testing', function () {
    return view('test_dashboard');
});



