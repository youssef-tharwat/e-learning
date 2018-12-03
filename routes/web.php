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

Route::get('dashboard/task/{id}','UserController@taskShow')->name('task.show');
Route::post('dashboard/task/complete','UserController@taskComplete')->name('task.complete');
Route::post('dashboard/task/score','UserController@taskScore')->name('task.score');

// Teacher 
Route::prefix('teacher')->group(function(){

    //Students
    Route::get('/dashboard', 'TeacherController@index')->name('teacher.dashboard');
    Route::delete('/student/{id}', 'TeacherController@destroyUser')->name('teacher.student.destroy.submit');
    Route::post('/search/user','TeacherController@searchUser')->name('search.user.submit');
    Route::get('/live_search/action', 'TeacherController@searchUser')->name('live_search.action');

    // Teacher - Tasks
    Route::post('/task/store', 'TasksController@store')->name('tasks.store');
    Route::get('/task/store', 'TasksController@create')->name('tasks.create');
    Route::post('/quiz/store', 'TasksController@storeQuiz')->name('quiz.store');
    Route::get('/quiz', 'TasksController@createQuiz')->name('quiz.create');
    Route::post('/checkquiz','TasksController@quizCheck')->name('quiz.check.submit');

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




