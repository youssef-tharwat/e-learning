<header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href=""><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
                            </div>
                            <ul class="navbar-nav ml-auto" style="display: flex; flex-direction: row;">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item mr-3">
                                    <ul class="nav nav-tabs|pills">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                                aria-haspopup="true" aria-expanded="false">Login</a>
                                            <div class="dropdown-menu p-3">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Student Login') }}</a>
                                                <a class="nav-link" href="{{ route('teacher.login') }}">{{ __('Teacher Login') }}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
    
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                    
                                    <ul class="nav nav-tabs|pills">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                                    aria-haspopup="true" aria-expanded="false">Register</a>
                                                <div class="dropdown-menu p-3">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Student Register') }}</a>
                                                    <a class="nav-link" href="{{ route('teacher.registration') }}">{{ __('Teacher Register') }}</a>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                                @else
                                    <li class="nav-item dropdown" id="notification-dropdown" style="margin-right: 1em;">
                                        <a id="notificationDropdown"  class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-bell"></i> <span class="badge-pill">{{count(Auth::user()->unreadNotifications)}}</span>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown" style="overflow: auto; height: 100px;">
                                            @foreach(Auth::user()->unreadNotifications as $notification)
                                                @include('layouts.partials.notification.video_call_notification',['$notification' => $notification])
                                            @endforeach
                                        </ul>
                                    </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">
    
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
    
                        <!-- Menu -->
                        <div class="classy-menu">
    
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
    
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ url('/teacher/dashboard') }}">Dashboard</a></li>
                                    <li><a href="#">Students</a>
                                        <ul class="dropdown">
                                            <li><a href="#register-student-section">Register</a></li>
                                            <li><a href="#register-student-section">Delete</a></li>
                                            <li><a href="#search-section">Search</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#search-section">Add Task</a></li>
                                    <li><a href="#scoreboard-section">Scoreboard</a></li>
                                    <li><a href="{{route('video.room')}}">Video Room</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
    
                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568
                                        889</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    