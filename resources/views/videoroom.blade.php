@extends('layouts.app')
@section('css')
    <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
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


    <style type="text/css">


        #video-section video {
            max-width: 100%;
            height: 300px;
            margin: 0 50px;
            box-sizing: border-box;
            border-radius: 2px;
            padding: 0;
        }

        #video-section{
            display: flex;
            justify-content: center;
            margin-bottom: 5em;
        }

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

        .order-table tr td:last-child{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tdl-content ul li label {
            display: flex;
            align-items: center;
        }

        .tdl-content a{
            cursor: pointer;
            display: flex;
            line-height: 50px;
            padding: 0 15px;
            padding-left: 30px;
            position: relative;
            margin: 0 !important;
            background: #fafafa;
            color: #99abb4;
            font-size: 15px;
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .card-body{
            padding:1em 0 !important;
        }

        tr th:last-child{
            text-align: center !important;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="orders" style="margin: 7em 0 2em 0;">
            <h1 style="margin-bottom: 1.5em; text-align: center;">Video Call Room</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div id="video-section">
                        <video id="localVideo" autoplay muted></video>
                        <video id="remoteVideo" autoplay></video>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#students" role="tab" aria-controls="custom-nav-home" aria-selected="true">Students</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="custom-nav-profile" aria-selected="false" style="margin-left:1em;">Teachers</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <div class="card-body--">
                                            <div class="table-stats order-table ov-h">
                                                <table class="table ">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Score</th>
                                                        <th>Level</th>
                                                        <th>Email</th>
                                                        <th>School</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($usersArray as $indexKey => $user)
                                                        <tr>
                                                            <td>{{$user['id']}}</td>
                                                            <td>  <span class="name">{{$user['name']}}</span> </td>
                                                            <td><span class="count">{{$user['score']}}</span></td>
                                                            <td> <span class="product">{{$user['level']}}</span> </td>
                                                            <td> <span class="product">{{$user['email']}}</span> </td>
                                                            <td>
                                                                <span class="badge badge-complete">{{$user['school_name']}}</span>
                                                            </td>

                                                            <td>
                                                                <button type="submit" onclick="sendNotification({{$user['id']}} , 2)"  class="btn btn-primary btn-sm call-button" style="padding:2px 12px;">
                                                                        Call
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <div class="card-body--">
                                            <div class="table-stats order-table ov-h">
                                                <table class="table ">
                                                    <thead>
                                                    <tr>

                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>School</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($teachersArray as $indexKey => $teacher)
                                                        <tr>
                                                            <td>  <span class="name">{{$teacher['id']}}</span> </td>
                                                            <td>  <span class="name">{{$teacher['name']}}</span> </td>
                                                            <td>  <span class="name">{{$teacher['email']}}</span> </td>
                                                            <td>
                                                                <span class="badge badge-complete">{{$teacher['school_name']}}</span>
                                                            </td>
                                                            <td>
                                                                <button type="submit" onclick="sendNotification({{$teacher['id']}} , 1)"  class="btn btn-primary btn-sm call-button" style="padding:2px 12px;">
                                                                    Call
                                                                </button>
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
                </div>

            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('js/script.js')}}"></script>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function sendNotification(element,type){

            $.ajax({
                url:'{{route('video.chat.notification')}}',
                method:"POST",
                data: {
                    id: element,
                    sessionID: window.location.hash,
                    type: type
                },
                dataType:'json',
                success:function(data)
                {
                    alert('success');
                    console.log('success');
                }
            });
        }

        jQuery(document).ready(function($) {

            // $('.call-button').click(function(){
            //     console.log(this);
            //     // sendNotification(this);
            // });


        });

    </script>

@endsection