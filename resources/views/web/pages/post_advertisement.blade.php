@extends('web.layouts.main_layout')

@section('content')
    <!-- Post Ad Page Start Here -->
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">Post an ad</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12F mb--sm">
                    <div class="gradient-wrapper">
                        <div class="gradient-title">
                            <h2>Post a Free Ad</h2>
                        </div>
                        <div class="input-layout1 gradient-padding post-ad-page">

                            @if(!Auth::check())
                                <div class="alert alert-danger text-center">
                                    <strong>Unauthorized!</strong> You should
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="alert-link">Login</a> or
                                    <a href="{{ route('register') }}" class="alert-link">Register</a> to post a Ad
                                </div>
                            @endif

                            <form id="post-add-form" method="POST" enctype="multipart/form-data"
                                  action="{{ route('post_ad') }}" name="post_ad">

                                {{ csrf_field() }}

                                @if ($errors->any())
                                    <div class="alert alert-danger text-center">
                                        <strong>Error!</strong> Please fix the following errors
                                    </div>
                                @endif

                                <fieldset @if(!Auth::check()) disabled @endif >

                                    <div class="mb-50 pb-30">

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Category<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                <div class="custom-select">
                                                    <select id="category-name" class='select2' name="category_id">

                                                        <option value="">Select a Category</option>

                                                        @foreach($categories as $catIndex => $category)
                                                            <option value="{{$catIndex}}" @if(old('category_id') == $catIndex) selected @endif>
                                                                {{$category['name']}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>


                                                @if ($errors->has('category_id'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('category_id') }}</small>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-3 col-12">
                                                <label class="control-label">Sub-Category<span> *</span></label>
                                            </div>
                                            {{--<input type="text" value="{{session("status")}}" ></div>--}}
                                            <div class="col-sm-9 col-12">
                                                <div class="form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                                                    <div class="custom-select">
                                                        <select id="sub-category-name" class='select2' name="subcategory_id">
                                                            <option value="">Select a Sub-Category</option>
                                                        </select>
                                                    </div>


                                                    @if ($errors->has('subcategory_id'))
                                                        <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('subcategory_id') }}</small>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 col-12">
                                                <label class="control-label">District</label>
                                            </div>
                                            <div class="col-sm-9 col-12">
                                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                    <div class="custom-select">
                                                        <select id="district-name" class='select2' name="district">
                                                            <option value="">Select a District (Optional)</option>

                                                            @foreach($districts as $district)
                                                                <option value="{{$district}}" @if(old('district') == $district) selected @endif >
                                                                    {{$district}}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    @if ($errors->has('district'))
                                                        <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('district') }}</small>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Ad Title <span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <input type="text" id="add-title" name="title"
                                                       value="{{ old('title') }}"
                                                       required maxlength="250"
                                                       class="form-control"
                                                       placeholder="Enter catchy title for your ad">

                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback"  style="display: block">
                                                        <small>{{ $errors->first('title') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Description<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group{{ $errors->has('summary-ckeditor') ? ' has-error' : '' }}">
                                                <textarea placeholder="What makes your ad unique"
                                                          class="form-control" id="summary-ckeditor" name="summary-ckeditor" rows="4" cols="20"  data-error="Description field is required" required>{{ old('description') }}</textarea>

                                                {{--<textarea placeholder="What makes your ad unique"--}}
                                                          {{--class="textarea form-control"--}}
                                                          {{--name="description" id="description" rows="4" cols="20"--}}
                                                          {{--data-error="Description field is required" required>{{ old('description') }}</textarea>--}}

                                                @if ($errors->has('summary-ckeditor'))
                                                    <span class="invalid-feedback"  style="display: block">
                                                        <small>{{ $errors->first('summary-ckeditor') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="first-name">Set Price</label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <input type="number" id="describe-ad2" name="price"
                                                       value="{{ old('price') }}"
                                                       class="form-control price-box"
                                                       placeholder="Set your Price Here">

                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio3" value="0" name="is_negotiable"
                                                           @if(old('is_negotiable') ==  0) checked="checked" @endif>
                                                    <label for="inlineRadio3">Fixed</label>
                                                </div>
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio4" value="1" name="is_negotiable"
                                                           @if(old('is_negotiable') ==  1) checked="checked" @endif>
                                                    <label for="inlineRadio4"> Negotiable </label>
                                                </div>

                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('price') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Ad Key Words <span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="" name="key_words"
                                                       value=""
                                                       required maxlength="250"
                                                       class="form-control"
                                                       placeholder="Enter your key words">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Upload Picture<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control"
                                                       name="img_1" value="{{ old('img_1') }}">

                                                @if ($errors->has('img_1'))
                                                    <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_1') }}</small>
                                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="file" class="form-control"
                                                       name="img_2" value="{{ old('img_2') }}">
                                                @if ($errors->has('img_2'))
                                                    <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_2') }}</small>
                                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group" >
                                                <input type="file" class="form-control"
                                                       name="img_3" value="{{ old('img_3') }}">
                                                @if ($errors->has('img_3'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('img_3') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="checkbox checkbox-primary checkbox-circle">
                                                <input id="checkbox3" type="checkbox"  name="featured"  @if($checkbox ==  1) checked @endif >
                                                <label for="checkbox3">Make this advertisement as featured.</label>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <button type="submit" class="cp-default-btn-sm">Submit For Review!</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                </fieldset>
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
                                <li><a>Make sure you post in the correct category</a></li>
                                <li><a >Add nice photos to your ad</a></li>
                                <li><a >Put a reasonable price</a></li>
                                <li><a>Check the item before publish</a></li>
                            </ul>
                        </div>
                    </div>
                    {{--<div class="sidebar-item-box">--}}
                        {{--<div class="gradient-wrapper">--}}
                            {{--<div class="gradient-title">--}}
                                {{--<h3>Quick Login</h3>--}}
                            {{--</div>--}}
                            {{--<div class="container">--}}
                                {{--<form  method="POST" action="{{ route('login') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--@if ($errors->login->has('email'))--}}
                                        {{--<div class="alert alert-danger">--}}
                                            {{--<strong>Error!</strong> {{ $errors->login->first('email') }}--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                    {{--<br>--}}
                                    {{--<label>Email</label>--}}
                                    {{--<input type="email" placeholder="E-mail" class="{{ $errors->login->has('email') ? ' is-invalid' : '' }} form-control"--}}
                                           {{--required name="email" value="{{ old('email') }}" >--}}
                                    {{--<br>--}}
                                    {{--<label>Password</label>--}}
                                    {{--<input type="password" placeholder="Password"--}}
                                           {{--class="{{ $errors->login->has('password') ? ' is-invalid' : '' }} form-control"--}}
                                           {{--name="password" required>--}}
                                    {{--<input type="text" hidden value="quick" name="login_type">--}}
                                    {{--<br>--}}
                                    {{--<div class="">--}}
                                        {{--<button type="submit" class="cp-default-btn-sm">Login</button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script >
        /**
         *ajax call for get sub categories
         *
         */
        $(document).ready(function(){
            $.ajax({
                url:"sub",
                method:'get',
                dataType:'json',
                data:{ id:$(this).find('option:selected').val()}
            }).done(function (res) {

                $(this).find('option:selected').val()
                $('#sub-category-name').empty();
                for(let i in res){
                    let temp=res[i];
                    $('#sub-category-name').append('<option value="'+i+'">'+temp['name']+'</option>');
                }

            });

            $('#category-name').change(function () {
                $.ajax({
                    url:"sub",
                    method:'get',
                    dataType:'json',
                    data:{ id:$(this).find('option:selected').val()}
                }).done(function (res) {

                    $(this).find('option:selected').val()
                    $('#sub-category-name').empty();
                    for(let i in res){
                        let temp=res[i];
                        $('#sub-category-name').append('<option value="'+i+'">'+temp['name']+'</option>');
                    }

                });

            });
        });


        CKEDITOR.replace( 'summary-ckeditor' );

    </script>
@endsection
