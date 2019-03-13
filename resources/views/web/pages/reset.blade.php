@extends('web.layouts.main_layout')

@section('content')

    <div style="margin-top: 150px">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="lostpassword"></a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right" style="margin-top: 20px">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <br>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

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

                        <div class="form-group row mb-0">                     
                            <div class="col-xl-7 col-5"></div>                
                            <div class="col-xl-3 col-3">                      
                                <button type="submit" class="btn btn-success">
                                    {{ __('Reset Password') }}                
                                </button>                                     
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