<?php

namespace App\Http\Controllers;

use App\Notifications\VideoCalls;
use Illuminate\Http\Request;
use App\School;
use App\User;
use App\Teacher;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class VideoChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web,teacher');
    }

    public function index(){
        $users = User::orderBy('name', 'ASEC')->get();
        $teachers = Teacher::orderBy('name', 'ASEC')->get();

        $usersArray = [] ;
        $teachersArray= [];

        foreach ($users as $key => $user) {
            $school = School::find($user->school_id);
            $schoolName = $school->name;

            $userArray = [
                'id' => $user->id,
                'name' => $user->name,
                'level' => $user->level,
                'score' => $user->score,
                'email' => $user->email,
                'school_name' => $schoolName,
            ];

            array_push($usersArray, $userArray);
        }

        foreach ($teachers as $key => $teacher) {
            $school = School::find($teacher->school_id);
            $schoolName = $school->name;

            $teacherArray = [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'email' => $teacher->email,
                'school_name' => $schoolName,
            ];

            array_push($teachersArray, $teacherArray);
        }

        // read
        if (isset(request()->no)){
            $notification = DatabaseNotification::find(request()->no);
            $notification->markAsRead();
        }

        return view('videoroom', compact('teachersArray', 'usersArray'));

    }

    public function sendNotification(Request $request){
        $user = null;

        if ($request->type == 1) {
            $user = Teacher::find($request->id);
        }else {
            $user = User::find($request->id);
        }

        $sessionID = $request->sessionID;
        $user->notify(new VideoCalls($request->id, $sessionID));

    }

    public function videochat(){
        return view('videochat');
    }
}
