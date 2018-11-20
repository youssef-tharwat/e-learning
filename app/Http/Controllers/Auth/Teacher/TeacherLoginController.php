<?php

namespace App\Http\Controllers\Auth\Teacher;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

class TeacherLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function showLoginForm(){
        return view('auth.teacher.login');
    }

    public function login(){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $email,'password' => $password], $request->$remember)) {

            return redirect('teacher.dashboard');

        } else {
            
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
