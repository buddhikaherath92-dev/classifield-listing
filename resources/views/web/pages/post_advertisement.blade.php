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

                                                        <option value="null">Select a Category</option>

                                                        @foreach($categories as $catIndex => $category)
                                                            <option value="{{$catIndex}}" @if(old('category_id') == $catIndex) selected @endif>
                                                                {{$category['name']}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <span class="invalid-feedback" id="p_cat_error">
                                                        <small>Please select a category!</small>
                                                </span>

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
                                                            <option value="null">Select a Sub-Category</option>
                                                        </select>
                                                    </div>

                                                    <span class="invalid-feedback" id="sub_cat_error">
                                                        <small>Please select a sub category!</small>
                                                    </span>

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
                                                <input type="text"
                                                       id="add-title" name="title"
                                                       value="{{ old('title') }}"
                                                       maxlength="250"
                                                       class="form-control"
                                                       placeholder="Enter catchy title for your ad">
                                                <span class="invalid-feedback" id="ad_title_error" >
                                                    <small>Please enter an advertisement title!</small>
                                                </span>


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
                                                          class="form-control" id="summary-ckeditor"
                                                          name="summary-ckeditor" rows="4" cols="20"
                                                          data-error="Description field is required">
                                                    {{ htmlspecialchars_decode(old('summary-ckeditor') ? old('summary-ckeditor') : '') }}
                                                </textarea>

                                                <span class="invalid-feedback" id="ad_description_error">
                                                    <small>Please type a descrition for advertisement!</small>
                                                </span>

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
                                            <label class="control-label" id="lblPrice" for="first-name">Set Price <span id="span"> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <input type="number" id="ad_price" name="price"
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

                                                <span class="invalid-feedback" id="ad_price_error" >
                                                        <small>Please enter the fixed price!</small>
                                                </span>

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
                                                <input type="text" id="keywords" name="key_words" value="{{old('key_words')}}">
                                                <span class="invalid-feedback" id="keywords_error">
                                                    <small>Please enter at-least one keyword!</small>
                                                </span>
                                                @if ($errors->has('key_words'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('key_words') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Upload Picture<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="img_1"
                                                       name="img_1" value="{{ old('img_1') }}">

                                                <span class="invalid-feedback" id="img_error">
                                                    <small>Please select at-least one image!</small>
                                                </span>

                                                @if ($errors->has('img_1'))
                                                    <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_1') }}</small>
                                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input type="file" class="form-control"
                                                       name="img_2" value="{{ old('img_2') }}" id="img_2">
                                                @if ($errors->has('img_2'))
                                                    <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_2') }}</small>
                                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group" >
                                                <input type="file" class="form-control"
                                                       name="img_3" value="{{ old('img_3') }}"id="img_3">
                                                @if ($errors->has('img_3'))
                                                    <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('img_3') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="checkbox checkbox-primary checkbox-circle">
                                                <input id="checkbox3" type="checkbox"  name="featured"  @if(old('featured') === 'on') checked @endif >
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
                                                <button type="submit" class="cp-default-btn-sm" id="submit_button">Submit For Review!</button>
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
            </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        /**
         *ajax call for get sub categories
         *
         */
        $(document).ready(function() {

            $.ajax({
                url: "sub",
                method: 'get',
                dataType: 'json',
                data: {id: $(this).find('option:selected').val()}

            }).done(function (res) {
                $(this).find('option:selected').val()
                $('#sub-category-name').empty();
                for (let i in res) {
                    let temp = res[i];
                    if (i === localStorage['subCategory']) {
                        $('#sub-category-name').append('<option selected value="' + i + '">' + temp['name'] + '</option>');
                    }
                    else {
                        $('#sub-category-name').append('<option value="' + i + '">' + temp['name'] + '</option>')
                    }

                }
            });

            $('#sub-category-name').change(function () {
                localStorage.setItem('subCategory', document.getElementById("sub-category-name").value)
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

            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "1") {
                    $("#span").hide('slow');
                }
                if ($(this).attr("value") == "0") {
                    $("#span").show('slow');

                }
            });


        });

        $('#keywords').tagsInput();

        CKEDITOR.replace( 'summary-ckeditor' );

        $("#submit_button").on('click', function (e) {
            if(!validateForm()) e.preventDefault();
        })

        function validateForm(){

            //validating category input
            if($('#category-name').children('option:selected').val() === 'null'){
                $('#category-name').focus();
                $('#p_cat_error').css('display', 'block');
                return false;
            }else{
                $('#p_cat_error').css('display', 'none');
            }

            //validating sub category
            if($('#sub-category-name').children('option:selected').val() === 'null'){
                $('#sub-category-name').focus();
                $('#sub_cat_error').css('display', 'block');
                return false;
            }else{
                $('#sub_cat_error').css('display', 'none');
            }

            //validating ad title
            if($('#add-title').val() === ''){
                $('#add-title').focus();
                $('#ad_title_error').css('display', 'block');
                return false;
            }else{
                $('#ad_title_error').css('display', 'none');
            }

            //validating ad description
            var messageLength = CKEDITOR.instances['summary-ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                CKEDITOR.instances['summary-ckeditor'].focus();
                $('#ad_description_error').css('display', 'block');
                return false;
            }else{
                $('#ad_description_error').css('display', 'none');
            }

            if($("input[name='is_negotiable']:checked").val() === '0' && $('#ad_price').val() === ''){
                $('#ad_price').focus();
                $('#ad_price_error').css('display', 'block');
                return false;
            }else{
                $('#ad_price_error').css('display', 'none');
            }

            //validating keywords
            if($('#keywords').val() === ''){
                $('#keywords').focus();
                $('#keywords_error').css('display', 'block');
                return false;
            }else{
                $('#keywords_error').css('display', 'none');
            }

            //validating images
            if(!$('#img_1').val() && !$('#img_2').val() && !$('#img_3').val()){
                $('#img_1').focus();
                $('#img_error').css('display', 'block');
                return false;
            }else{
                $('#img_error').css('display', 'none');
            }

            return true;

        }

    </script>
@endsection
