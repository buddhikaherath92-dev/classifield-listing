@extends('web.layouts.dashboard_layout')

@section('content')
    <style>
        .text-divider{margin: 2em 0; line-height: 0; text-align: center;}
        .text-divider span{background-color:  #E0DFDA  ; padding: 1em;}
        .text-divider:before{ content: " "; display: block; border-top: 1px solid #adb5bd; border-bottom: 1px solid #adb5bd;}
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}

        @media only screen and (max-width: 868px) {
            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }
        }

    </style>
    <div class="col-12">
    <div class="container"style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-9" style="width: 400px">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf

                            @if ($errors->login->has('email'))
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> {{ $errors->login->first('email') }}
                                </div>
                                {{--placeholder="E-mail"--}}
                            @endif

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right"> Email address *</label>

                                    <input id="email" type="email" placeholder="E-mail" class="form-control {{ $errors->login->has('email') ? ' is-invalid' : '' }}" required autofocus  name="email" value="{{ old('email') }}"style="width: 330px;height: 38px" >

                            </div>

                            <div class="form-group row">
                                <label  for="password" class="col-md-4 col-form-label text-md-right" >Password *</label>

                                    <input id="password" placeholder="Password" type="Password"  class="form-control{{ $errors->login->has('password') ? ' is-invalid' : '' }}" name="password" required style="width: 330px">

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xl-5"></div>
                                <div class="col-xl-4">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"style="background-color: seagreen;width: 100px ;" value="Login">
                                            Sign in
                                        </button>
                                        <button type="button" class="btn btn-primary"style="background-color: seagreen;width: 100px" href="{{ route('register') }}">
                                            <a class="login-btn" href="{{ route('register') }}  " style="color: white">

                                                Register
                                            </a>
                                        </button>

                                    </div>
                                </div>
                                <div class="col-xl-1"></div>
                            </div>

                            <div class="row">
                                <div class="col-xl-5"></div>
                                <div class="col-xl-4">
                                    <div class="float-right">
                                        <a  style="color: green" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-1"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
@endsection


