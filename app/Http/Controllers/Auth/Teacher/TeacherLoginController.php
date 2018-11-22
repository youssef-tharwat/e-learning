<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;



class TeacherLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function showLoginForm(){
        return view('auth.teacher.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('teacher')->attempt([
            'email' => $request->email ,
            'password' => $request->password ]
            , $request->remember)) {

            return redirect()->intended(route(('teacher.dashboard')));

        } else {
            
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }
}
