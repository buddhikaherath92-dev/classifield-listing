@extends('admin.layouts.default')

@section('child-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <div class="container" style="background-color: white">
            <br><br>
            <form action="{{ route('admin_newsletters_store') }}" method="post" id="newsletter_form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">Title :</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Title For News Letter">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description :</label>
                    <div class="col-sm-10">
                        <textarea placeholder="What makes your ad unique"
                                  class="textarea form-control" name="description" id="description" rows="4" cols="20"
                                  data-error="Description field is required" required></textarea>
                    </div>
                </div>
                <div class="form-group" id="advertisementPendingBar">
                    <label class="control-label col-sm-2" for="description">Advertisements :</label>
                    <div class="row container" id="singleAdvertisement">
                        <div class="col-4">
                            <select class="form-control" id="advertisement_combo" name="advertisement_combo">
                                @foreach($advertisements as $index => $advertisement)
                                    <option value="{{ $advertisement->id }}" data-title="{{ $advertisement->title }}"
                                            id="{{'option'.$advertisement->id}}" name="select_ad">{{$advertisement->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button id="btn_add" type="button" name="add" class="btn btn-primary btnConfirm">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <ul style="text-decoration: none" id="manage_area">

                            </ul>
                        </div>
                    </div>
                    <br>
                    <form class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" value="" id="array_data" name="array_data">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                        </div>
                    </form>
                    <br>
                </div>
            </form>
        </div>
    </table><br>
@endsection

@section('script')
    <script type="text/javascript">
        let array = [];
        let count = 0;
        let titiles = [];

        $('#btn_add').click(function () {
            if (count < 6) {
                let advertisement_id = $('#advertisement_combo').val();
                let title = $('#option' + advertisement_id).attr('data-title');
                if(array.indexOf(advertisement_id) == -1){
                    array.push(advertisement_id);
                    let string_array = array.join();
                    $('#array_data').val(string_array);
                    count++;
                    $('#manage_area').append("<li id='display"+advertisement_id+"'>"+title+"&nbsp&nbsp&nbsp"+"<button class='btn btn-danger' id='1' onclick='removeAdvertisement("+advertisement_id+")'>Remove</button>"+"</l>"+"<br><br>");
                }else{
                    alert("This Advertisement Has Been Already Added To The News Letter");
                }
            } else {
                alert("Limit has been Exceeded\nMaximum Advertisement Count is 6");
            }
        });

        function removeAdvertisement(id){
           $('#display'+id).remove();
           array.splice(id);
        }

    </script>
@endsection