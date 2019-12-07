@extends('web.layouts.main_layout')

@section('content')




    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 mb--sm">
                    <div class="gradient-wrapper">
                        <div class="gradient-title">
                            <h2>Register with us</h2>
                        </div>
                        <div class="input-layout1 gradient-padding post-ad-page">
                            <form id="user-register-form"  method="POST" action="{{ url('/register') }}">

                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Error!</strong> Please fix the following errors
                                    </div>
                                @endif

                                <div class="mb-50 pb-30">

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label possition-top" for="first-name">Account Type <span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">

                                                <fieldset>
                                                    <label>
                                                        <input type="radio"  value="1" name="account_type" checked="checked"
                                                               @if(old('account_type') ==  config('constance.user_types')['individual']) checked="checked" @endif/> Individual
                                                    </label>
                                                    <label style="margin-left: 10px">
                                                        <input type="radio"  value="3"
                                                               @if(old('account_type') ==  config('constance.user_types' )['corporate']) checked="checked" @endif
                                                               name="account_type" /> Corporate
                                                    </label>
                                                </fieldset>
                                                <label class="error" for="account_type" id="radio-button-error"></label>


                                                @if ($errors->has('account_type'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('account_type') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-mail">Email<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="email" id="seller-mail" name="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       value="{{ old('email') }}"
                                                       placeholder="Enter Your E-mail Address">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="error" for="email"></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-mail">Password<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="password" id="password" name="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       placeholder="Enter Your Strong Password">
                                                <label class="error" for="password"></label>


                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('password') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="password_confirmation">Confirm Password<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="password" id="password_confirmation"  name="password_confirmation"
                                                       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                       placeholder="Retype the password your choose">
                                                <label class="error" for="password_confirmation"></label>


                                                @if ($errors->has('password_confirmation'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('password_confirmation') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-name">Name<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="seller-name" name="name"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       value="{{ old('name') }}"
                                                       placeholder="Seller / Organization Name">
                                                <label class="error" for="name"></label>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('name') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="phone">Phone<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="tel" id="phone" name="tel_no"
                                                       class="form-control{{ $errors->has('tel_no') ? ' is-invalid' : '' }}"
                                                       value="{{ old('tel_no') }}"
                                                       placeholder="Enter your Mobile">

                                                <span id="valid-msg" class="hidden-mb"></span>
                                                <span id="error-msg" class="hidden-mb"></span>
                                                <span><label class="error" for="tel_no"></label>

                                                @if ($errors->has('tel_no'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('tel_no') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{session('token')}}"  name="token" hidden>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <button type="submit" class="cp-default-btn-sm">Submit Now!</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>How To Sell Quickly?</h3>
                            </div>
                            <ul class="sidebar-sell-quickly">
                                <li><a >Use a brief title and description of the item.</a></li>
                                <li><a >Make sure you post in the correct category</a></li>
                                <li><a >Add nice photos to your ad</a></li>
                                <li><a >Put a reasonable price</a></li>
                                <li><a >Check the item before publish</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <form>
        </div>
    </section>
@endsection
