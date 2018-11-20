<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="header-content h-100 d-flex align-items-center justify-content-between">
                        <div class="academy-logo">
                            <a href="{{url('/')}}"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
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
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Teacher Register') }}</a>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                            @else
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
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/about')}}">About Us</a></li>
                                        <li><a href="{{url('/course')}}">Course</a></li>
                                        <li><a href="{{url('/contact')}}">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-4">
                                            <img src="{{asset('img/bg-img/bg-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="course.html">Course</a></li>
                                <li><a href="contact.html">Contact</a></li>
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
