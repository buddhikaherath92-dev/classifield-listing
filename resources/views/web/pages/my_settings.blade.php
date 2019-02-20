@extends('web.layouts.dashboard_layout')

@section('child-content')
    <h3 class="title-section">Account Settings</h3>
    <div class="public-profile">


        <form id="post-add-form" method="POST" action="{{ route('update_my_settings') }}">

            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <strong>Error!</strong> Please fix the following errors
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ session()->get('message') }}
                </div>
            @endif

            <div class="mb-50 pb-30">

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label possition-top" for="first-name">New password </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="current_password" type="password" class="form-control" name="password"
                                   value="{{ old('password') }}" required
                                   placeholder="Enter new password for your account">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block">
                                		<strong>{{ $errors->first('password') }}</strong>
                            		</span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label" for="seller-mail">Confirm Password </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input id="new_password" type="password" class="form-control" name="password_confirmation"
                                   value="{{ old('password_confirmation') }}" required
                                   placeholder="Retype your strong password">

                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" style="display: block">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
                            		</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <button type="submit" class="cp-default-btn-sm">Update Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection