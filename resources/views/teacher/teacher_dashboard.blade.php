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
#scoreboard-grouped > div > div > table > thead > tr > th:nth-child(6){
    display: flex;
    align-items: center;
    justify-content: center;
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


</style>
@endsection

@section('content')
    
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
       
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
                                            <div class="stat-text"><span class="count">0</span></div>
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
                                            <div class="stat-text"><span class="count">0</span></div>
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
                                        <i class="pe-7s-users"></i>
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
                    <div class="col-lg-6">
                                <div class="card">
                                        <div class="card-header">Register Student</div>
                                        <div class="card-body card-block">
                                                <form method="POST" action="{{ route('teacher.student.registration.submit') }}">
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
                                                    </form>
                                        </div>
                                    </div>
                        </div>
                    <div class="col-lg-6">
                            <div class="card">
                                    <div class="card-header">Delete Student</div>
                                    <div class="card-body card-block">
                                            <div class="table-stats order-table ov-h" >
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th class="serial">#</th>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Score</th>
                                                                <th>Level</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($users as $indexKey => $user)
                                                            <tr>
                                                                    <td class="serial">{{$indexKey + 1}}</td>
                                                                    <td>{{$user->id}}</td>
                                                                    <td>  <span class="name">{{$user->name}}</span> </td>
                                                                    <td><span class="count">{{$user->score}}</span></td>
                                                                    <td> <span class="product">{{$user->level}}</span> </td>
                                                                    <td> 
                                                                        <a  href="delete/{{ $user->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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
        "use strict";

        // Pie chart flotPie1
        var piedata = [
            { label: "S.K Bukit Jalil", data: [[1,32]], color: '#5c6bc0'},
            { label: "S.K Sri Petalling ", data: [[1,33]], color: '#ef5350'},
            { label: "S.K Seri Kembangan", data: [[1,35]], color: '#66bb6a'}
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
        $.plot('#cellPaiChart', cellPaiChart, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 0
                    }
                }
            },
            legend: {
                show: false
            },grid: {
                hoverable: true,
                clickable: true
            }

        });
        // cellPaiChart End
        // Line Chart  #flotLine5
        var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        var plot = $.plot($('#flotLine5'),[{
            data: newCust,
            label: 'New Data Flow',
            color: '#fff'
        }],
        {
            series: {
                lines: {
                    show: true,
                    lineColor: '#fff',
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 3
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                show: false
            },
            grid: {
                show: false
            }
        });
        // Line Chart  #flotLine5 End
      
    
        // Bar Chart #flotBarChart
        $.plot("#flotBarChart", [{
            data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
            bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
            }
        }], {
            grid: {
                show: false
            }
        });
        // Bar Chart #flotBarChart End
    });

    
</script>
@endsection

