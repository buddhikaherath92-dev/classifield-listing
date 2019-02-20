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
                            <form id="post-add-form"  method="POST" action="{{ url('/register') }}">

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
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio"  value="1" name="account_type" id="r_two"
                                                           @if(old('account_type') ==  1) checked="checked" @endif
                                                           class="{{ $errors->has('account_type') ? ' is-invalid' : '' }}" />
                                                    <label for="r_two"> Individual</label>
                                                </div>
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" value="2" id="r_one"
                                                           @if(old('account_type') ==  2) checked="checked" @endif
                                                           name="account_type" class="{{ $errors->has('account_type') ? ' is-invalid' : '' }}" />
                                                    <label for="r_one"> Corporate </label>
                                                </div>

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
                                                <input type="email" id="seller-mail" name="email" required
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       value="{{ old('email') }}"
                                                       placeholder="Enter Your E-mail Address">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-mail">Password<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" required
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       placeholder="Enter Your Strong Password">

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
                                                <input type="password" id="password_confirmation"  required name="password_confirmation"
                                                       class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                       placeholder="Retype the password your choose">

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
                                                <input type="text" id="seller-name" name="name" required
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       value="{{ old('name') }}"
                                                       placeholder="Seller / Organization Name">

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
                                                <input type="tel" id="phone" name="tel_no" required
                                                       class="form-control{{ $errors->has('tel_no') ? ' is-invalid' : '' }}"
                                                       value="{{ old('tel_no') }}"
                                                       placeholder="Enter your Mobile">

                                                <span id="valid-msg" class="hidden-mb"></span>
                                                <span id="error-msg" class="hidden-mb"></span>

                                                @if ($errors->has('tel_no'))
                                                    <span class="invalid-feedback">
                                                        <small>{{ $errors->first('tel_no') }}</small>
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