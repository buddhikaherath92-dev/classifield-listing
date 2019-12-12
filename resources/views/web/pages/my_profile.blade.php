@extends('web.layouts.dashboard_layout')

@section('child-content')

    <h3 class="title-section">
        <img src="{{Auth::user()->logo !== null ?  env('APP_URL')."images/user_profile_pictures/".Auth::user()->logo
         : 'https://www.bspmediagroup.com/event/img/logos/user_placeholder.png'}}"
             alt="" class="img-thumbnail" style="width: 50px; height: 50px">
        {{Auth::user()->name}}'s Profile
    </h3>
    <div class="public-profile">
        <form id="post-add-form" method="POST" action="{{ route('update_my_profile') }}"
              enctype="multipart/form-data">

            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger">
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
                        <label class="control-label possition-top" for="first-name">Account Type </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" value="1" name="account_type" id="r_two"
                                       @if( Auth::user()->type == 1 | old('account_type') ==  config('constance.user_types')['individual']) checked="checked"
                                       @endif
                                       class="{{ $errors->has('account_type') ? ' is-invalid' : '' }}"/>
                                {{--class="{{ $errors->has('account_type') ? ' is-invalid' : '' }}" />--}}
                                <label for="r_two"> Individual</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" value="3" id="r_one"
                                       @if( Auth::user()->type == 3 | old('account_type') ==  config('constance.user_types' )['corporate']) checked="checked"
                                       @endif
                                       name="account_type"
                                       class="{{ $errors->has('account_type') ? ' is-invalid' : '' }}"/>
                                <label for="r_one"> Corporate </label>
                            </div>

                            @if ($errors->has('account_type'))
                                <span class="invalid-feedback" style="display: block">
              <strong>{{ $errors->first('account_type') }}</strong>
          </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label" for="seller-mail">Email </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <input type="email" id="seller-mail" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ Auth::user()->email }}"
                                   placeholder="Enter Your E-mail Address" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label" for="seller-name">Name </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <input type="text" id="seller-name" name="name" required
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{  old('name') ? old('name') : Auth::user()->name }}"
                                   placeholder="Seller / Organization Name">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label" for="phone">Phone </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <input type="tel" id="phone" name="tel_no" required
                                   class="form-control{{ $errors->has('tel_no') ? ' is-invalid' : '' }}"
                                   value="{{ old('tel_no') ? old('tel_no') : Auth::user()->tel_no }}"
                                   placeholder="Enter your Mobile">

                            <span id="valid-msg" class="hidden-mb"></span>
                            <span id="error-msg" class="hidden-mb"></span>

                            @if ($errors->has('tel_no'))
                                <span class="invalid-feedback">
              <strong>{{ $errors->first('tel_no') }}</strong>
          </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <label class="control-label" for="add-title">Profile Picture / Logo </label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <input type="file" id="img-upload1" name="logo"
                                   value="{{ old('logo') }}"
                                   class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}">

                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" style="display: block">
                      <strong>{{ $errors->first('logo') }}</strong>
                  </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{--<style>.page-title{--}}
                {{--background: #e7e7e7 none repeat scroll 0 0;--}}
                {{--border: 1px solid #c1c1c1;--}}
                {{--font-weight: 100;--}}
                {{--margin: 0;--}}
                {{--padding: 15px 0;--}}
                {{--text-transform: uppercase;--}}
                {{--}--}}

                {{--.widget {--}}
                {{--background: #ececec none repeat scroll 0 0;--}}
                {{--border: 1px solid #adadad;--}}
                {{--border-radius: 5px 5px 0 0;--}}
                {{--margin: 20px 0;--}}
                {{--padding: 0;--}}
                {{--}--}}
                {{--.widget-title {--}}
                {{--background: #e4e4e4 none repeat scroll 0 0;--}}
                {{--border-radius: 5px 5px 0 0;--}}
                {{--font-size: 22px;--}}
                {{--font-weight: 100;--}}
                {{--margin: 0;--}}
                {{--padding: 15px 0;--}}
                {{--text-transform: uppercase;--}}
                {{--}--}}
                {{--.add-remove-class{--}}
                {{--margin:15px 0px;--}}
                {{--}--}}

                {{--.show-more-snippet {--}}
                {{--height:35px;--}}
                {{--width:100%;--}}
                {{--overflow:hidden;--}}
                {{--}--}}

                {{--#div-id{--}}
                {{--display:none;--}}
                {{--}--}}

                {{--.content_wrapper_text{--}}
                {{--margin: 30px 0;--}}
                {{--background: #dfdfdf;--}}
                {{--padding: 30px;--}}
                {{--}--}}
                {{--.content_wrapper_text p{--}}
                {{--margin: 15px 0 0 0 ;--}}

                {{--}</style>--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                {{--<div class="content_wrapper_text">--}}
                {{--<button id="myShowHidebtn" class="btn btn-primary">Hide</button>--}}
                {{--<p style="display: none;">Paragraph Containt..Paragraph Containt..Paragraph Containt..Paragraph Containt..Paragraph Containt..</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="row">
                    <div class="col-sm-3 col-12">
                    </div>
                    <div class="col-sm-9 col-12">
                        <div class="form-group">
                            <button type="submit" class="cp-default-btn-sm">Update Now!</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Share link for Friends</h3>

                    </div>
                    <div class="col-md-8">
                        <!-- Button trigger modal -->
                        <button type="button" onclick="onGenerateURLClick()" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" id="url-btn">
                            Generate Url
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Share Url</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="url" name="url"
                                               class="form-control" placeholder="Url" value="">
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <a id="copyButton" class="btn btn-success"  onclick="copyFunction()">Copy</a>
                                        <br>
                                        <a href="" class="btn btn-info " id="fb_share"><span class="fa fa-facebook-official"></span>&nbsp;&nbsp;&nbsp;Share On facebook</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
    </form>
    </div>
@endsection

@section('script')
    <script>
        function onGenerateURLClick(){
            $.ajax({
                url:"{{ url('/create_url') }}",
                method:"GET",
                async :true,
                dataType:"JSON"
            }).done(function (response) {
                document.getElementById("url").value=response.data;
                document.getElementById("fb_share").href='https://www.facebook.com/sharer/sharer.php?u='+response.data;

            })
        }
    </script>
@endSection
