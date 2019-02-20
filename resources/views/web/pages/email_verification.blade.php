@extends('web.layouts.dashboard_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header" style="color: #1c7430;margin-top: 150px">{{ __('Please Check Your E-mail and Enter the Verify Code Here ') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert" >
                                <br>
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification code.') }}
                        {{ __('If you did not receive the email') }},

                    </div>
                    <form action="{{ route('verify_user') }}" method="post">
                        @csrf
                        <input type="number" id="email_code"  required name="email_code"
                               class="form-control"
                               placeholder="Retype the pin Code" style="width: 500px;margin-left: 30px">

                        <div class="form-group" style="margin-top: 10px;margin-left: 20px">
                            <button type="submit" class="cp-default-btn-sm">Enter Now!</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    @endsection


