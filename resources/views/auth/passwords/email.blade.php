@extends('web.layouts.main_layout')

@section('content')
<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (isset($status) && $status !== null && isset($email) && $email !== null)
                        <div class="alert alert-success" role="alert">
                            The password verification link is sent to <strong>{{$email}}</strong>
                        </div>
                    @endif

                    @if (!isset($status))
                            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf

                                <div class="form-group row" >
                                    <label for="email" class="col-md-3 col-form-label text-md-right" >{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success" style="margin-left: 54px">Send Password Reset Link
                                            {{--{{ __('Send Password Reset Link') }}--}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <br>
@endsection
