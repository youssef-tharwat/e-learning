<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Quiz;
use App\User;
use App\School;
use App\Attempts;
use \Pusher\Pusher;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::orderBy('score', 'DESC')->get();

        $usersArray = [] ;
        $singleUsersArray = [];
        $schoolScores = [
            "bukitJalil" =>  User::whereschool_id(1)->sum('score') ,
            "sriPetalling"=> User::whereschool_id(2)->sum('score'),
            "seriKembangan" => User::whereschool_id(3)->sum('score'),
        ];

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

        $attemptedQuizes = [];
        $Attempts = Attempts::whereuser_id(Auth::user()->id)->get();

        foreach ($Attempts as $Attempt){
            array_push($attemptedQuizes, $Attempt->quiz_id);
        }

        $quizes =  Quiz::whereNotIn('id', $attemptedQuizes)->where('assigned', '=', 1)->get();


        $quizesCompleted = $Attempts;

        return view('dashboard', compact('quizes', 'quizesCompleted', 'users', 'singleUsersArray', 'schoolScores', 'usersArray'));
    }

//    Tasks

    public function  taskShow($id){

            $Task = Task::wherequiz_id($id)->get();
            $TaskEncoded = json_encode($Task);

            $QuizID = $Task[0]->quiz_id;
            $Quiz = Quiz::whereid($QuizID)->first();
            $QuizName = $Quiz->name;

            $User = User::find(Auth::user()->id);
            $UserSchool = $User->school_id;

            Attempts::create([
                'user_id' => Auth::user()->id,
                'school_id'=> $UserSchool,
                'quiz_id' => $id,
                'attempted' => 1,
                'score' => 0
            ]);

        return view('task',compact('TaskEncoded', 'QuizName', 'QuizID'));
    }


    public function taskScore(Request $request){
        $user = User::find(Auth::user()->id);
        $user->score += $request->score;
        $user->save();

        return route('user.dashboard');
    }

    public function testing(){
        return view('videochat');
    }

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        $pusher = new Pusher('fbf1b872c5f8c1aaee3e', '1fb4874a07be95246335', '664900', [
            'cluster' => 'ap1',
            'encrypted' => true
        ]);
        $presence_data = ['name' => Auth::user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, Auth::user()->id, $presence_data);
        return response($key);
    }


}
