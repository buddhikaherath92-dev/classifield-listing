@extends('web.layouts.main_layout')

@section('content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li><a href="#">My Dashboard</a> -</li>
                    @if(Route::currentRouteName() === 'my_profile')
                        <li class="active">My Profile</li>
                    @endif
                    @if(Route::currentRouteName() === 'my_settings')
                        <li class="active">My Settings</li>
                    @endif
                    @if(Route::currentRouteName() === 'my_ads')
                        <li class="active">My Ads</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="gradient-wrapper sidebar-item-box">
                        <ul class="nav tab-nav my-account-title">
                            <li class="nav-item">
                                <a class="{{Route::currentRouteName() === 'my_profile' ? "active" : ''}}"
                                                    href="{{route('my_profile')}}">
                                    My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="{{Route::currentRouteName() === 'my_ads' ? "active" : ''}}"
                                   href="{{route('my_ads')}}">
                                    My Ads
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="{{Route::currentRouteName() === 'my_settings' ? "active" : ''}}"
                                   href="{{route('my_settings')}}">
                                    My Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="tab-content my-account-wrapper gradient-wrapper gradient-padding input-layout1">
                        @yield('child-content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection