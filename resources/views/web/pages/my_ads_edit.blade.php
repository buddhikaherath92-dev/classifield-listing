@extends('web.layouts.dashboard_layout')

@section('child-content')
    <h3 class="title-section">Edit Ad : '{{ $advertisement->title }}' </h3>
    <div id="post-ad-form-wrapper">
        <p class="text-center" style="color: white"><small>Loading sub categories...</small></p>
        <div id="post-ad-loading-wrap"></div>
    </div>
    <div class="input-layout1 gradient-padding post-ad-page">

        <form id="post-add-form" method="POST" enctype="multipart/form-data"
              action="{{ route('my_ads_edit_real') }}" name="post_ad">

            {{ csrf_field() }}

            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <strong>Error!</strong> Please fix the following errors
                </div>
            @endif

            <div class="mb-50 pb-30">

                <input type="hidden" name="id" value="{{$advertisement->id}}">

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
                                        <option value="{{$catIndex}}"
                                                {{ 'data-sub='.$advertisement->subcategory_id }}
                                                @if($advertisement->category_id == $catIndex) selected @endif>
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
                                        <option value="{{$district}}"
                                                @if($advertisement->district == $district) selected @endif >
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
                                   value="{{ $advertisement->title }}"
                                   maxlength="250"
                                   class="form-control"
                                   placeholder="Enter catchy title for your ad">
                            <span class="invalid-feedback" id="ad_title_error">
                                                    <small>Please enter an advertisement title!</small>
                                                </span>


                            @if ($errors->has('title'))
                                <span class="invalid-feedback" style="display: block">
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
                                                          class="form-control"
                                                          name="summary-ckeditor" rows="4" cols="20"
                                                          data-error="Description field is required" wrap="hard">{{ htmlspecialchars_decode($advertisement['summary-ckeditor'])  }}</textarea>

                            <span class="invalid-feedback" id="ad_description_error">
                                                    <small>Please type a descrition for advertisement!</small>
                                                </span>

                            @if ($errors->has('summary-ckeditor'))
                                <span class="invalid-feedback" style="display: block">
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
                                   value="{{ $advertisement->price }}"
                                   class="form-control price-box"
                                   placeholder="Set your Price Here">

                            <div class="radio radio-primary radio-inline">
                                <input type="radio" id="inlineRadio3" value="0" name="is_negotiable"
                                       @if( $advertisement->is_negotiable ==  0) checked="checked" @endif>
                                <label for="inlineRadio3">Fixed</label>
                            </div>
                            <div class="radio radio-primary radio-inline">
                                <input type="radio" id="inlineRadio4" value="1" name="is_negotiable"
                                       @if($advertisement->is_negotiable ==  1) checked="checked" @endif>
                                <label for="inlineRadio4"> Negotiable </label>
                            </div>

                            <span class="invalid-feedback" id="ad_price_error">
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
                            <input type="text" id="keywords" name="key_words" value="{{$advertisement->key_words}}">
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
                                   name="img_1" value="{{$advertisement->img_1}}">
                            <img id="img_1_preview" class="img-thumbnail" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}"
                                 style="max-height: 50px; max-width: 100px; margin: 5px; {{$advertisement->img_1 !== null ? 'display: block' : 'display:none'}} "/>

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
                            <img id="img_2_preview" class="img-thumbnail" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_2}}"
                                 style="max-height: 50px; max-width: 100px; margin: 5px; {{$advertisement->img_2 !== null ? 'display: block' : 'display:none'}} "/>

                            @if ($errors->has('img_2'))
                                <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_2') }}</small>
                                                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control"
                                   name="img_3" value="{{ old('img_3') }}" id="img_3">
                            <img id="img_3_preview" class="img-thumbnail" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_3}}"
                                 style="max-height: 50px; max-width: 100px; margin: 5px; {{$advertisement->img_3 !== null ? 'display: block' : 'display:none'}}"/>

                            @if ($errors->has('img_3'))
                                <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('img_3') }}</small>
                                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control"
                                   name="img_4" value="{{ old('img_4') }}" id="img_4">
                            <img id="img_4_preview" class="img-thumbnail" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_4}}"
                                 style="max-height: 50px; max-width: 100px; margin: 5px; {{$advertisement->img_4 !== null ? 'display: block' : 'display:none'}}"/>

                            @if ($errors->has('img_4'))
                                <span class="invalid-feedback" style="display: block">
                                                        <small>{{ $errors->first('img_4') }}</small>
                                                    </span>
                            @endif
                        </div>

                        <div class="checkbox checkbox-primary checkbox-circle">
                            <input id="checkbox3" type="checkbox" name="featured"
                                   @if($advertisement->is_featured) checked @endif >
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
                            <button type="submit" class="cp-default-btn-sm" id="submit_button">Submit For Review!
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </form>


    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#'+target).attr('src', e.target.result);
                    $('#'+target).css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img_1").change(function() {
            readURL(this, 'img_1_preview');
        });
        $("#img_2").change(function() {
            readURL(this, 'img_2_preview');
        });
        $("#img_3").change(function() {
            readURL(this, 'img_3_preview');
        });
        $("#img_4").change(function() {
            readURL(this, 'img_4_preview');
        });

        /**
         *ajax call for get sub categories
         *
         */
        $(document).ready(function() {
            localStorage.setItem('subCategory',  $(this).find('option:selected').data('sub'));
            $.ajax({
                url: "/sub",
                method: 'get',
                dataType: 'json',
                cache : false,
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
                if($(this).find('option:selected').val() !== null){
                    $('#post-ad-form-wrapper').css("display", "block");
                    $('#post-ad-loading-wrap').css("display", "block");
                    $.ajax({
                        url:"/sub",
                        method:'get',
                        dataType:'json',
                        cache : false,
                        data:{ id:$(this).find('option:selected').val()}
                    }).done(function (res) {
                        setTimeout(function(){
                            $('#post-ad-form-wrapper').css('display', 'none');
                            $('#post-ad-loading-wrap').css('display', 'none');
                        }, 1000);
                        $(this).find('option:selected').val()
                        $('#sub-category-name').empty();
                        for(let i in res){
                            let temp=res[i];
                            $('#sub-category-name').append('<option value="'+i+'">'+temp['name']+'</option>');
                        }

                    });
                }

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
            if(!$('#img_1').val() && !$('#img_2').val() && !$('#img_3').val() && !$('#img_4').val()){
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
