<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Teacher;
use App\School;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class TeacherRegisterController extends Controller
{
    
    protected $redirectTo = '/teacher/login';

   
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $schools = School::where('teacher_id', '===', 0)->get();
        return view('auth.teacher.register')->with('schools', $schools);
    }

    protected function guard()
    {
        return Auth::guard();
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($teacher = $this->create($request->all())));

//        $this->guard()->login($teacher);

        return $this->registered($request, $teacher)
                        ?: redirect()->intended(route('teacher.login'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Teacher
     */
    protected function create(array $data)
    {
        $school = School::whereName($data['school'])->first();
        $schoolID = $school->id;

        Teacher::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'school_id' => $schoolID,
        ]);

        return event($this->updateSchool($school));
    }

    protected function updateSchool($school){
        $schoolID = $school->id;
        $teacher = Teacher::whereschool_id($schoolID)->first();
        $school->teacher_id = $teacher->id;
        return $school->save();
    }

     /**
     * The teacher has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $teacher
     * @return mixed
     */
    protected function registered(Request $request, $teacher)
    {
        //
    }

    
}
