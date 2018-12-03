@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
<link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">



<style>
    body {
        background-color: #f1f2f7;
    }

    .header-area .academy-main-menu .classy-navbar{
        background:white;
    }

    #sticky-wrapper > div > div > div{
        max-width:100% !important;
        padding:0;
    }

    #academyNav > div.classy-menu > div.classynav > ul{
        margin-bottom:0;
    }

    .small-device .right-panel{
        margin-left: 0 !important;
    }

    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }

    #flotPie1  {
        height: 150px;
    }
    #flotPie1 td {
        padding:3px;
    }
    #flotPie1 table {
        top: 32px!important;
        right:4em;
       
    }

    #flotPie1 > div > div{
        display: none;
    }
    .chart-container {
        display: table;
        min-width: 270px ;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    #flotLine5  {
         height: 105px;
    }

    #flotBarChart {
        height: 150px;
    }
    #cellPaiChart{
        height: 160px;
    }

    .right-panel{
        margin-left: 0%;
        margin-top:5em;
    }


.table-stats tbody {
    display:block;
    height:300px;
    overflow:auto;
}
 .table-stats thead, 
 .table-stats tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;/* even columns width , fix width of table too*/
}

#right-panel > div.content > div > div.orders > div > div.col-xl-8 > div > div.card-body-- > div > table > thead > tr > th:nth-child(6){
    display: flex;
    align-items: center;
    justify-content: center;
}

#right-panel > div.content > div > div:nth-child(3) > div:nth-child(2) > div > div.card-body.card-block > div > table > thead > tr > th:nth-child(6){
    display: flex;
    align-items: center;
    justify-content: center;
}

#right-panel > div.content > div > div.orders > div > div.col-xl-8 > div > div{
    padding: 10px;
    padding-left: 0;
    padding-right:0;
}

#scoreboard > div > div > table > thead > tr > th:nth-child(6),
#right-panel > div.content > div > div:nth-child(3) > div:nth-child(2) > div > div.card-body.card-block > div > table > thead > tr > th:nth-child(5),
#scoreboard-grouped > div > div > table > thead > tr > th:nth-child(6){
    display: flex;
    align-items: center;
    justify-content: center;
}

#right-panel > div.content > div > div:nth-child(3) > div:nth-child(2) > div > div.card-body.card-block{
    padding:20px 0;
}

#nav-tabContent{
    padding:0 !important;
}

.card .nav-tabs{
    margin-bottom:1em;
    margin-left:1em;
    border-bottom-color: transparent !important;
}

.order-table tr td:last-child {
    display: flex;
    align-items: center;
    justify-content: center;
}


    #dynamic_field{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height:400px;
        overflow:auto;
    }

    #tasks_form #dynamic_field {
        overflow-x: hidden !important;
    }

    #userSearchTable{

    }

    .question-group{
        padding: 0 10px;
        width: 100%;
    }


    .dynamic-added{
        width: 100%;
    }


    #userSearchTable > thead > tr > th{
        border: none;
        border-bottom: 1px solid #e8e9ef;
        color: #868e96;
        font-size: 12px;
        font-weight: normal;
        padding: .75em 1.25em;
        text-transform: uppercase;
        background: #e8e9ef !important;
    }



</style>
@endsection

@section('content')
    
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                       <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{count($assignedQuizes)}}</span></div>
                                            <div class="stat-heading">Tasks Created</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                       <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{count($Attempts)}}</span></div>
                                            <div class="stat-heading">Tasks Completed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{count($singleUsersArray)}}</span></div>
                                            <div class="stat-heading">Students</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->

                <div class="orders">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="custom-tab">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#scoreboard" role="tab" aria-controls="custom-nav-home" aria-selected="true">Scoreboard</a>
                                                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#scoreboard-grouped" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Grouped Scoreboard</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                        <div class="tab-pane fade active show" id="scoreboard" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                                <div class="card-body--">
                                                                        <div class="table-stats order-table ov-h">
                                                                            <table class="table ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="serial">#</th>
                                                                                        <th>ID</th>
                                                                                        <th>Name</th>
                                                                                        <th>Score</th>
                                                                                        <th>Level</th>
                                                                                        <th>School</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                           
                                                                                            @foreach ($singleUsersArray as $indexKey => $user)
                                                                                                <tr>
                                                                                                    <td class="serial">{{$indexKey + 1}}</td>
                                                                                                    <td>{{$user['id']}}</td>
                                                                                                    <td>  <span class="name">{{$user['name']}}</span> </td>
                                                                                                    <td><span class="count">{{$user['score']}}</span></td>
                                                                                                    <td> <span class="product">{{$user['level']}}</span> </td>
                                                                                                    <td> 
                                                                                                        <span class="badge badge-complete">{{$user['school_name']}}</span>
                                                                                                    </td>
                                                                                                    
                                                                                                </tr>
                                                                                            @endforeach
                                                                                         
                                                                                </tbody>
                                                                            </table>
                                                                        </div> <!-- /.table-stats -->
                                                                    </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="scoreboard-grouped" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                                <div class="card-body--">
                                                                        <div class="table-stats order-table ov-h">
                                                                            <table class="table ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="serial">#</th>
                                                                                        <th>ID</th>
                                                                                        <th>Name</th>
                                                                                        <th>Score</th>
                                                                                        <th>Level</th>
                                                                                        <th>School</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        @foreach ($usersArray as $indexKey => $user)
                                                                                        <tr>
                                                                                            <td class="serial">{{$indexKey + 1}}</td>
                                                                                            <td>{{$user['id']}}</td>
                                                                                            <td>  <span class="name">{{$user['name']}}</span> </td>
                                                                                            <td><span class="count">{{$user['score']}}</span></td>
                                                                                            <td> <span class="product">{{$user['level']}}</span> </td>
                                                                                            <td> 
                                                                                                <span class="badge badge-complete">{{$user['school_name']}}</span>
                                                                                            </td>
                                                                                            
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div> <!-- /.table-stats -->
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    
                                    
                                </div> <!-- /.card -->
                            </div>  <!-- /.col-lg-8 -->
    
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="card br-0">
                                            <div class="card-body">
                                                <div class="chart-container ov-h" style="width:100%;">
                                                    <div id="flotPie1" class="float-chart"></div>
                                                </div>
                                            </div>
                                        </div><!-- /.card -->
                                    </div>
    
                                </div>
                            </div> <!-- /.col-md-4 -->
                        </div>
                    </div>

                <div class="row">
                    <div class="col-lg-5" style="display:flex;">
                        <div class="card" style="width:100%;">
                            <div class="card-header">Create Quiz</div>
                            <div class="card-body card-block" style="display: flex;flex-direction: column;">
                                <form id="quiz_form" method="POST" action="{{ route('quiz.store') }}" style="margin: auto;width: 100%;">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="quiz-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="quiz-name" type="text"  class="form-control{{ $errors->has('quiz-name') ? ' is-invalid' : '' }}" name="quiz-name" value="{{ old('quiz-name') }}" required autofocus>

                                            @if ($errors->has('quiz-name'))
                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('quiz-name') }}</strong>
                                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Educational Level') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="level" id="quizLevel" required>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade" style="display:none; margin-top:1em;">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Successfully Created!
                                        <button type="button" class="close" onclick="" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade" style="display:none; margin-top:1em;">
                                        <span class="badge badge-pill badge-danger">Error!</span>
                                        Something went wrong! Try again.
                                        <button type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="sufee-alert alert with-close alert-danger second alert-dismissible fade" style="display:none; margin-top:1em;">
                                        <span class="badge badge-pill badge-danger">Error!</span>
                                        Quiz name already exists!
                                        <button type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary pu">
                                                {{ __('Create') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7" style="display:flex;">
                        <div class="card" style="width:100%;">
                            <div class="card-header">Search Student</div>
                            <div class="card-body card-block">
                                <div class="card-body--">
                                    <div class="form-group row">
                                        <label for="search" class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-controller form-control" id="search" name="search" />
                                        </div>
                                    </div>
                                    <div class="table-stats ov-h">
                                        <table class="table " id="userSearchTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Score</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-12" style="display:flex;">
                        <div class="card" style="width:100%;">
                            <div class="card-header">Create Questions</div>
                            <div class="card-body card-block">
                                <form name="add_name" id="tasks_form" method="POST" action="{{ route('tasks.store') }}">
                                    @csrf
                                    <div class="table-responsive">
                                        <div class="table table-bordered" id="dynamic_field">
                                            <div class="question-group">

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="quizName" class=" col-form-label text-md-right">{{ __('Select Quiz') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <select class="form-control" name="quizName" id="quizName" required>
                                                            @foreach ($nonAssignedQuizes as $quiz)
                                                                <option value="{{$quiz->name}}">{{$quiz->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="question" class="col-form-label text-md-right">{{ __('Question') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <textarea name="question[]" required class="form-control name_list" placeholder="Enter Question" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="answer1" class=" col-form-label text-md-right">{{ __('Answer 1') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <input type="text" name="answer1[]" placeholder="Answer 1" required class="form-control name_list" />
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="answer2" class=" col-form-label text-md-right">{{ __('Answer 2') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <input type="text" name="answer2[]" required placeholder="Answer 2" class="form-control name_list" />
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="answer3" class=" col-form-label text-md-right">{{ __('Answer 3') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <input type="text" name="answer3[]" required placeholder="Answer 3" class="form-control name_list" />
                                                    </div>
                                                </div>

                                                <div class="form-group row" style="display: flex;align-items: center;">
                                                    <div class="col-md-2">
                                                        <label for="correctAnswer" class=" col-form-label text-md-right">{{ __('Select Correct Answer') }}</label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <select class="form-control name_list" name="correctAnswer[]" id="correctAnswer" required>
                                                            <option>Answer 1</option>
                                                            <option>Answer 2</option>
                                                            <option>Answer 3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <button type="button" name="add" id="add" class="btn btn-success btn-sm" style="margin-bottom: 1em;">Add More</button>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" id="submit123" class="btn btn-info" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6" style="display:flex;">
                                <div class="card" style="width:100%;">
                                        <div class="card-header">Register Student</div>
                                        <div class="card-body card-block">
                                                <form id="registeration_form" method="POST" action="{{ route('teacher.student.registration.submit') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                                @if ($errors->has('name'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                                @if ($errors->has('password'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Educational Level') }}</label>
                                                            <div class="col-md-6">
                                                                  <select class="form-control" name="level" id="level" required>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                  </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="parent_name" class="col-md-4 col-form-label text-md-right">{{ __('Parent Name') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="parent_name" type="text" class="form-control" name="parent_name" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="parent_email" class="col-md-4 col-form-label text-md-right">{{ __('Parent Email') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="parent_email" type="email" class="form-control" name="parent_email" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary pu">
                                                                    {{ __('Register') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade" style="display:none; margin-top:1em;">
                                                            <span class="badge badge-pill badge-success">Success</span>
                                                            You successfully registered the student.
                                                            <button type="button" class="close"  aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade" style="display:none; margin-top:1em;">
                                                            <span class="badge badge-pill badge-danger">Error!</span>
                                                            Something went wrong! Try again.
                                                            <button type="button" class="close"  aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                        </div>
                                </div>
                    </div>
                    <div class="col-lg-6" style="display:flex;">
                            <div class="card">
                                    <div class="card-header">Delete Student</div>
                                    <div class="card-body card-block" style="padding:0;">
                                            <div class="table-stats order-table ov-h" >
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                               
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Score</th>
                                                                <th>Level</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="min-height:370px;">
                                                                @foreach ($singleUsersArray as $indexKey => $user)
                                                                    <tr>
                                                                      
                                                                        <td>{{$user['id']}}</td>
                                                                        <td>  <span class="name">{{$user['name']}}</span> </td>
                                                                        <td><span class="count">{{$user['score']}}</span></td>
                                                                        <td> <span class="product">{{$user['level']}}</span> </td>
                                                                        <td> 

                                                                            {!! Form::open(['action' => ['TeacherController@destroyUser', $user['id'] ] , 'method' => 'POST']) !!}
                                                                                {{Form::hidden('_method', 'DELETE')}}
                                                                                {{Form::submit('Delete', ['class'=> 'btn btn-danger btn-sm'])}}
                                                                            {!! Form::close() !!}
                                                                                
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>
                                            </div> 
                                    </div>
                                </div>
                    </div>
        
                </div>
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
       
    </div>
    <!-- /#right-panel -->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="{{asset('assets/js/init/fullcalendar-init.js')}}"></script>

<!--Local Stuff-->
<script>


    jQuery(document).ready(function($) {

        $(document).on('keyup', '#search', function(){
            let query = $(this).val();
            fetch_customer_data(query);
        });


        function fetch_customer_data(query = '') {
            $.ajax({
                url:"{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#userSearchTable tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        fetch_customer_data();

        function successButtonDismiss() {
            $('.alert-success button').click(function(){
                $(this).parent().css('display', 'none');
            });
        }

        function dangerButtonDismiss() {
            $('.alert-danger button').click(function(){
                $(this).parent().css('display', 'none');
            });
        }


        function duplicateQuiz(element){
            let formData = {
                'quiz-name' : $(element).val(),
                '_token'            : '{{ csrf_token() }}'
            };

            $.ajax({
                type: "POST",
                url: '{{route('quiz.check.submit')}}',
                data: formData,
                dataType: "json",
                success: function(res) {
                    if(res.exists){
                        $('#quiz_form .alert-danger.second').css('display', 'block');
                        $('#quiz_form .alert-danger.second').addClass('show');
                        document.getElementById('quiz_form').reset();
                    }
                },
                error: function (jqXHR, exception) {
                    alert(exception);
                    alert(jqXHR);
                }
            });
        }

        $('#quiz-name').blur(function(){
            duplicateQuiz(this);
        });


        successButtonDismiss();
        dangerButtonDismiss();


        let i=1;


        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added">' +
                '<div  class="question-group" style="margin: 1em 0;">' +
                '                                                <div class="form-group row" style="display: flex;align-items: center;">'+
                '                                                    <div class="col-md-2">'+
                '                                                        <label for="question" class="col-form-label text-md-right">Question</label>'+
                '                                                    </div>'+
                ''+
                '                                                    <div class="col-md-10">'+
                '                                                        <input type="text" required name="question[]" placeholder="Enter Question" class="form-control name_list" />'+
                '                                                    </div>'+
                '                                                </div>'+
                ''+
                '                                                <div class="form-group row" style="display: flex;align-items: center;">'+
                '                                                    <div class="col-md-2">'+
                '                                                        <label for="answer1" class=" col-form-label text-md-right">Answer 1</label>'+
                '                                                    </div>'+
                ''+
                '                                                    <div class="col-md-10">'+
                '                                                        <input type="text" name="answer1[]" required placeholder="Answer 1" class="form-control name_list" />'+
                '                                                    </div>'+
                '                                                </div>'+
                ''+
                '                                                <div class="form-group row" style="display: flex;align-items: center;">'+
                '                                                    <div class="col-md-2">'+
                '                                                        <label for="answer2" class=" col-form-label text-md-right">Answer 2</label>'+
                '                                                    </div>'+
                ''+
                '                                                    <div class="col-md-10">'+
                '                                                        <input type="text" name="answer2[]" required placeholder="Answer 2" class="form-control name_list" />'+
                '                                                    </div>'+
                '                                                </div>'+
                ''+
                '                                                <div class="form-group row" style="display: flex;align-items: center;">'+
                '                                                    <div class="col-md-2">'+
                '                                                        <label for="answer3" class=" col-form-label text-md-right">Answer 3</label>'+
                '                                                    </div>'+
                ''+
                '                                                    <div class="col-md-10">'+
                '                                                        <input type="text" name="answer3[]" required placeholder="Answer 3" class="form-control name_list" />'+
                '                                                    </div>'+
                '                                                </div>'+
                ''+
                '                                                <div class="form-group row" style="display: flex;align-items: center;">'+
                '                                                    <div class="col-md-2">'+
                '                                                        <label for="correctAnswer" class=" col-form-label text-md-right">Select Correct Answer</label>'+
                '                                                    </div>'+
                ''+
                '                                                    <div class="col-md-10">'+
                '                                                        <select class="form-control name_list" name="correctAnswer[]" id="correctAnswer" required>'+
                '                                                            <option>Answer 1</option>'+
                '                                                            <option>Answer 2</option>'+
                '                                                            <option>Answer 3</option>'+
                '                                                        </select>'+
                '                                                    </div>'+
                '                                                </div>' +
            '</div>' +
                '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm" style="margin-left:10px; margin-bottom:1em;">Remove</button>' +
                '</div>');
        });


        $(document).on('click', '.btn_remove', function(){
            let button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function(){
            $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }


        // process the form
        $('#registeration_form').submit(function(event) {

            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'name'              : $('input[name=name]').val(),
                'email'             : $('input[name=email]').val(),
                'password'          : $('input[name=password]').val(),
                'password_confirmation'  : $('input[name=password_confirmation]').val(),
                'level'             : $('select[name=level]').val(),
                'parent_name'       : $('input[name=parent_name]').val(),
                'parent_email'      : $('input[name=parent_email]').val(),
                '_token'            : '{{ csrf_token() }}'
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '{{ route('teacher.student.registration.submit') }}', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                encode      : true,
                success     : function(){
                    document.getElementById('registeration_form').reset();
                    $('#registeration_form .alert-success').css('display', 'block');
                    $('#registeration_form .alert-success').addClass('show');
                }
            }).fail(function () {
                    // Handle error here
                    $('#registeration_form .alert-danger').css('display', 'block');
                    $('#registeration_form .alert-danger').addClass('show');
                });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });

        // process the form
        $('#quiz_form').submit(function(event) {

            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            let formData = {
                'quiz-name'              : $('input[name=quiz-name]').val(),
                'level'             : $('select[name=level]').val(),
                '_token'            : '{{ csrf_token() }}'
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '{{ route('quiz.store') }}', // the url where we want to POST
                async:false,
                data        : formData, // our data object
                dataType    : 'text', // what type of data do we expect back from the server
                encode      : true,
                success: function(){
                    document.getElementById('quiz_form').reset();
                    $('#quiz_form .alert-success').css('display', 'block');
                    $('#quiz_form .alert-success').addClass('show');
                },
                error: function(){
                    $('#quiz_form .alert-danger').css('display', 'block');
                    $('#quiz_form .alert-danger').addClass('show');
                }
            });

            event.preventDefault();
        });


        // Pie chart flotPie1
        var piedata = [
            { label: "S.K Bukit Jalil", data: [[1, {{$schoolScores["bukitJalil"] }}]], color: '#5c6bc0'},
            { label: "S.K Sri Petalling ", data: [[1,{{$schoolScores["sriPetalling"] }} ]], color: '#ef5350'},
            { label: "S.K Seri Kembangan", data: [[1,{{$schoolScores["seriKembangan"] }} ]], color: '#66bb6a'}
        ];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2/3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        // Pie chart flotPie1  End
        // cellPaiChart
        var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
        ];
    });


</script>
@endsection

