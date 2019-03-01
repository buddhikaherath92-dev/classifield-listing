@extends('web.layouts.dashboard_layout')


@section('content')

    <div class="container " style="margin-top: -30px">

        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 200px;height: 400px">

                <div class="card" >

                    <div class="card-header" style="color: #1c7430;">{{ __('Please check your e-mail and enter the verify code here ') }}</div>

                    <div class="card-body" >
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert" >
                                <br>
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __("We've sent a verification code to ")}}{{\Illuminate\Support\Facades\Auth::user()->email}}
                        {{ __('Please type the verification code in the following.') }},

                    </div>
                    <form action="{{ route('verify_user') }}" method="post">
                        @csrf
                      <div class="container">
                          <input type="number" id="email_code"  required name="email_code"
                                 class="form-control"
                                 placeholder="Retype the pin Code">
                      </div>
                        <div class="form-group" style="margin-top: 10px;margin-left: 20px">
                            <button type="submit" class="cp-default-btn-sm">Verify!</button>
                        </div>

                        <a  style="color: green;margin-left: 10px" href="{{ route('resendCode') }}" >
                            Resent  a Verify Code
                        </a>
                    </form>
                </div>

            </div>
        </div>
    </div>
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

]
    <br><br>
    @endsection


