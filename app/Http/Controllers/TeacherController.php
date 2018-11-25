<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\School;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::orderBy('score', 'DESC')->get();
        $usersArray = [] ;
        $singleUsersArray = [];

        foreach ($users as $key => $user) {
            $school = School::find($user->school_id);
            $schoolName = $school->name;
            
            $userArray = [
                'id' => $user->id,
                'name' => $user->name,
                'level' => $user->level,
                'score' => $user->score,
                'school_name' => $schoolName,
                'parent_name' => $user->parent_name,
                'parent_email' => $user->parent_email,
            ];

            array_push($usersArray, $userArray);
        }
        

        foreach ($users as $key => $user) {
            $school = School::find($user->school_id);

            if(Auth::user()->school_id == $school->id){
                $schoolName = $school->name;
            
                $singleUserArray = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'level' => $user->level,
                    'score' => $user->score,
                    'school_name' => $schoolName,
                    'parent_name' => $user->parent_name,
                    'parent_email' => $user->parent_email,
                ];

                array_push($singleUsersArray, $singleUserArray);
            }
        }

        

    


        return view('teacher.teacher_dashboard', compact('usersArray','users', 'singleUsersArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
