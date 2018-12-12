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
Route::get('dashboard/game', 'GameController@index')->name('game');

// Teacher 
Route::prefix('teacher')->group(function(){

    //Teacher - Students
    Route::get('/dashboard', 'TeacherController@index')->name('teacher.dashboard');
    Route::delete('/student/{id}', 'TeacherController@destroyUser')->name('teacher.student.destroy.submit');
    Route::post('/search/user','TeacherController@searchUser')->name('search.user.submit');
    Route::get('/live_search/action', 'TeacherController@searchUser')->name('live_search.action');
    Route::post('/file/store', 'TeacherController@storeFiles')->name('file.store');

    // Teacher - Tasks
    Route::post('/task/store', 'TasksController@store')->name('tasks.store');
    Route::get('/task/store', 'TasksController@create')->name('tasks.create');
    Route::post('/quiz/store', 'TasksController@storeQuiz')->name('quiz.store');
    Route::get('/quiz', 'TasksController@createQuiz')->name('quiz.create');
    Route::post('/checkquiz','TasksController@quizCheck')->name('quiz.check.submit');

    // Teacher - Auth
    Route::get('/login', 'Auth\Teacher\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Auth\Teacher\TeacherLoginController@login')->name('teacher.login.submit');
    Route::get('/register', 'Auth\Teacher\TeacherRegisterController@showRegistrationForm')->name('teacher.registration');
    Route::post('/register', 'Auth\Teacher\TeacherRegisterController@register')->name('teacher.registration.submit');
    Route::post('/student/register', 'Auth\Teacher\UserRegisterController@studentRegister')->name('teacher.student.registration.submit');
});

// Video chat

Route::get('/videoroom', 'VideoChatController@index')->name('video.room');
Route::post('/videoroom/notification', 'VideoChatController@sendNotification')->name('video.chat.notification');


// Chat Room


Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');

Broadcast::routes();

Route::get('/about', function (){
    return view('about-us');
})->name('about');

Route::get('/contact', function (){
    return view('contact');
})->name('contact');


// Testing 

//Route::get('/testing', function () {
//
//});




