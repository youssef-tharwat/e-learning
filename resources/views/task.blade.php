@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/jquery.quiz-min.css')}}">
    <style type="text/css">

        #quiz{
            width: 100%;
            margin-bottom: 10em;
            margin-top: 10em;
        }

        #questions{
            margin-top: 2em;
        }

        .answers a{
            background: lightgrey;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12"></div>
            <div id="quiz">
                <div id="quiz-header">
                    <h1>{{$QuizName}}</h1>
                    <p><a id="quiz-home-btn">Select the correct answer</a></p>
                </div>
                <div id="quiz-start-screen">
                    <p>
                        <a href="#" id="quiz-start-btn" class="quiz-button">Start Task</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{asset('js/plugins/jquery.quiz-min.js')}}"></script>

    <script type="text/javascript">
        let Task =  {!! $TaskEncoded !!};



        $( document ).ready(function() {

            correctAnswer = 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#quiz').quiz({
                questions:Task,
                restartButtonText: 'Done',

                answerCallback: function(currentQuestion, selected){
                    correctAnswer =  $('#questions > div.question-container > ul > li > a.correct').size();
                }
            });
            function scoreCalculator(element) {

                $.ajax({
                    type        : 'POST',
                    url         : '{{ route('task.score') }}',
                    data        : {'score': element},
                    success     : function(response){
                        console.log(response);
                        window.location = response;
                    }
                })
            }

            $('#quiz-restart-btn').click(function(){
                scoreCalculator(correctAnswer);
                }
            )

        });

    </script>
@endsection