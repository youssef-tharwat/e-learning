<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\Quiz;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }


    public function store(Request $request){

        event($this->create($request->all()));
        return back();

    }

    public function create(array $data){


        $counter = 0;
        $correctAnswerIndex = null;
        $numberOfQuestion = count($data['question']);

        $Quiz = Quiz::whereName($data['quizName'])->firstOrFail();
        $QuizID = $Quiz->id;
        $Quiz->assigned = 1;
        $Quiz->save();


        for ($i = 0; $i < $numberOfQuestion; $i++){

            if ($data['correctAnswer'][$numberOfQuestion - 1] === "Answer 1"){
                $correctAnswerIndex = 0;
            } else if($data['correctAnswer'][$numberOfQuestion - 1] == "Answer 2"){
                $correctAnswerIndex =  1;
            } else if ($data['correctAnswer'][$numberOfQuestion - 1] == "Answer 3"){
                $correctAnswerIndex = 2;
            }


            Task::create([
                'quiz_id' => $QuizID,
                'q' => $data['question'][$counter],
                'options' => [
                    $data['answer1'][$counter],
                    $data['answer2'][$counter],
                    $data['answer3'][$counter],
                ],
                'correctIndex' => $correctAnswerIndex,
                'correctResponse' => 'Correct!',
                'incorrectResponse' => 'Incorrect!',

            ]);

            $counter++;
        }

        return route('teacher.dashboard');

    }

    public function quizCheck(Request $request){
        $quiz = $request->input('quiz-name');

        $isExists = Quiz::wherename($quiz)->first();

        if ($isExists){
            return response()->json(array("exists" => true));
        } else {

            return response()->json(array("exists" => false));
        }
    }

    public function storeQuiz(Request $request){
        event($this->createQuiz($request->all()));
    }

    public function createQuiz(array $data){
        return Quiz::create([
            'name' => $data['quiz-name'],
            'level' => $data['level'],
            'assigned_by' => Auth::user()->id,
            'assigned' => 0,
            'completed' => false,
        ]);
    }
}
