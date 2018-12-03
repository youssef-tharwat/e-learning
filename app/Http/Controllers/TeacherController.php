<?php

namespace App\Http\Controllers;
use DB;
use App\Teacher;
use App\User;
use App\School;
use App\Quiz;
use App\Task;
use App\Attempts;
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


        $nonAssignedQuizes = Quiz::where('assigned', '=', 0)->get();
        $assignedQuizes = Quiz::whereassigned_by(Auth::user()->id)->get();
        $Attempts = Attempts::where('school_id', '=', Auth::user()->school_id)->get();

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

    
        return view('teacher.teacher_dashboard', compact('usersArray','users', 'singleUsersArray', 'schoolScores','nonAssignedQuizes','assignedQuizes', 'Attempts'));
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('teacher.dashboard');
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


    public function searchUser(Request $request)

    {
        if($request->ajax()) {

            $output="";
            $query = $request->get('query');
            $users= DB::table('users')->where([
                ['school_id', '=', Auth::user()->school_id],
                ['name','LIKE','%'.$query."%"],
            ])->get();

            if($users) {

                foreach ($users as $key => $user) {
                    $output.='<tr>'.
                        '<td><span class="name">'.$user->id.'</span></td>'.

                        '<td><span class="name">'.$user->name.'</span></td>'.

                        '<td><span class="name">'.$user->email.'</span></td>'.

                        '<td><span class="name">'.$user->level.'</span></td>'.

                        '<td><span class="name">'.$user->score.'</span></td>'.

                        '</tr>';
                }


            } else {
                $output = '
                       <tr>
                        <td align="center" colspan="5">No Data Found</td>
                       </tr>
                       ';
            }
            $data = array(
                'table_data'  => $output
            );

            return json_encode($data);
        }
    }



}
