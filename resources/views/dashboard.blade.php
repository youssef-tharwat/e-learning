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

    </style>
@endsection

@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
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
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{Auth::user()->score}}</span></div>
                                            <div class="stat-heading">Score</div>
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
                                            <div class="stat-text"><span class="count">{{count($quizesCompleted)}}</span></div>
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
                                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span>{{count($quizes)}}</span></div>
                                            <div class="stat-heading">Tasks Due</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->

                <section id="todotask-section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title box-title">Todo Tasks</h4>
                                    <div class="card-content">
                                        <div class="todo-list">
                                            <div class="tdl-holder">
                                                <div class="tdl-content">
                                                    <ul>
                                                        @foreach($quizes as $quiz)
                                                            <li>
                                                                <a href="{{route('task.show', $quiz->id)}}">
                                                                    <span>{{$quiz->name}}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <!-- /.todo-list -->
                                    </div>
                                </div> <!-- /.card-body -->
                            </div><!-- /.card -->
                        </div>


                    </div>
                </section>


                <section id="scoreboard-section">
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
                </section>

                <section id="create-question-section">
                    <div class="row">
                        <div class="col-lg-12" style="display:flex;">
                            <div class="card" style="width:100%;">
                                <div class="card-header">Materials</div>
                                <div class="card-body card-block">
                                    <ul>
                                        @foreach($files as $file)
                                        <li class="form-control">
                                            <a href="{{asset('storage/upload/'.$file['name'])}}" target="_blank">{{$file['name']}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


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
                { label: "S.K Bukit Jalil", data: [[1, 20]], color: '#5c6bc0'},
                { label: "S.K Sri Petalling ", data: [[1, 50]], color: '#ef5350'},
                { label: "S.K Seri Kembangan", data: [[1,30 ]], color: '#66bb6a'}
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


        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "S.K Bukit Jalil", data: [[1, 20]], color: '#5c6bc0'},
                { label: "S.K Sri Petalling ", data: [[1, 50]], color: '#ef5350'},
                { label: "S.K Seri Kembangan", data: [[1,30 ]], color: '#66bb6a'}
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
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [
                        [0, 18000, 35000,  25000,  22000,  0],
                        [0, 33000, 15000,  20000,  15000,  300],
                        [0, 15000, 28000,  15000,  30000,  5000]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: true
                    }
                });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                            {
                                label: "Visit",
                                borderColor: "rgba(4, 73, 203,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(4, 73, 203,.5)",
                                data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                            },
                            {
                                label: "Bounce",
                                borderColor: "rgba(245, 23, 66, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(245, 23, 66,.5)",
                                pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                            },
                            {
                                label: "Targeted",
                                borderColor: "rgba(40, 169, 46, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(40, 169, 46, .5)",
                                pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
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

