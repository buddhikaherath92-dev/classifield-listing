<header>
    <div id="header-three" class="header-style1 header-fixed">

        <!-- Top header begin -->
        <div class="header-top-bar top-bar-style1 nav-margin">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                        <div class="top-bar-left">
                            <a href="{{route('view_post_ad')}}" class="cp-default-btn d-lg-none">Post Your Ad</a>
                            <p class="d-none d-lg-block">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>Have any questions? info@aluthads.lk
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-4">
                        <div class="top-bar-right">
                            <ul>
                                @if (Auth::check())
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="login-btn">
                                                <i class="fa fa-power-off" aria-hidden="true"></i>Logout
                                            </button>

                                        </form>
                                    </li>
                                    <li>
                                        <a class="login-btn" href="{{ route('my_profile') }}" id="dash-btn">
                                            <i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="login-btn" href="/login">
                                            <i class="fa fa-lock" aria-hidden="true"></i>Login
                                        </a>
                                    </li>
                                    <li>
                                        <a class="login-btn" href="{{ route('register') }}">
                                            <i class="fa fa-registered" aria-hidden="true"></i>Register
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top header begin -->

        <div class="main-menu-area bg-primary" id="sticker">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="logo-area">
                            <a href="/" class="img-fluid">
                                   <img src="{{asset('web/img/logo.png')}}"  id='main_logo' />
                               {{--<h5>--}}
                                   {{--<span id="logo-part-one"><strong>A</strong>luth</span><span id="logo-part-two"><strong>Ads</strong></span><span id="logo-part-one">.lk</span>--}}
                               {{--</h5>--}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                        <div class="cp-main-menu">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{url('/list/corporate_ads')}}">Corporate Ads</a></li>
                                    <li><a href="{{url('/list/individual_ads')}}">Individual Ads</a></li>
                                    <li><a href="{{'/about_us'}}">About Us</a></li>
                                    <li><a href="{{'/contact'}}">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 text-right">
                        <a href="{{route('view_post_ad')}}" class="cp-default-btn">Post Your Ad</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{url('/list/corporate_ads')}}">Corporate Ads</a></li>
                                <li><a href="{{url('/list/individual_ads')}}">Individual Ads</a></li>
                                <li><a href="{{url('/aboutAs')}}">About Us</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>
