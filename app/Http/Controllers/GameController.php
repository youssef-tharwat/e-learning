<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Attempts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $attemptedQuizes = [];
        $Attempts = Attempts::whereuser_id(Auth::user()->id)->get();

        foreach ($Attempts as $Attempt){
            array_push($attemptedQuizes, $Attempt->quiz_id);
        }

        $quizes =  Quiz::whereNotIn('id', $attemptedQuizes)->where('assigned', '=', 1)->get();

        $quizesDue = count($quizes);
        if ($quizesDue >= 1){
            return back();
        } else {
            return view ('game');
        }

    }
}
