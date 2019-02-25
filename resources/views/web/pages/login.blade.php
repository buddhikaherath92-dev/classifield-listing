@extends('web.layouts.dashboard_layout')

@section('content')
    <div class="container"style="margin-top: 150px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf

                            @if ($errors->login->has('email'))
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> {{ $errors->login->first('email') }}
                                </div>placeholder="E-mail"
                            @endif

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Username or email address *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="E-mail" class="{{ $errors->login->has('email') ? ' is-invalid' : '' }}" required autofocus  name="email" value="{{ old('email') }}"style="width: 300px" >



                                </div>
                            </div>

                            <div class="form-group row">
                                <label  for="password" class="col-md-4 col-form-label text-md-right" >Password *</label>

                                <div class="col-md-6">
                                    <input id="password" placeholder="Password"  class="form-control{{ $errors->login->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>

                            <div class="checkbox checkbox-primary">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Remember Me</label>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4" >
                                    <button type="submit" class="btn btn-primary"style="background-color: seagreen;width: 150px" value="Login">
                                       Sign in
                                    </button>
                                    <button type="submit" class="btn btn-primary"style="background-color: seagreen;width: 150px" href="#">
                                        {{--<a href="{{'/web/pages/register'}}"> </a>--}}
                                        Register
                                    </button>


                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection


