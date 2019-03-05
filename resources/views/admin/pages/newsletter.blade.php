@extends('admin.layouts.default')

@section('child-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Add New One
        </button>

        <br><br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 35px; right: 5px">
                        <span aria-hidden="true" style="float: right; right: 0">×</span>
                    </button>
                    <br>
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
                                <div class="col-10">
                                    <select class="form-control" id="advertisement_combo" name="advertisement_combo">
                                        @foreach($advertisements as $index => $advertisement)
                                            <option value="{{ $advertisement->id }}"
                                                    data-title="{{ $advertisement->title }}"
                                                    id="{{'option'.$advertisement->id}}"
                                                    name="select_ad">{{$advertisement->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button id="btn_add" type="button" name="add"
                                                    class="btn btn-primary btnConfirm">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <br>
                                    <ul style="list-style: none;" id="title_area">

                                    </ul>
                                </div>
                                <div class="col-4">
                                    <br>
                                    <ul style="list-style: none;" id="button_area">

                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" value="" id="array_data" name="array_data">
                                <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Newsletter Id</th>
                    <th scope="col">Newsletter Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Preview</th>
                </tr>
                </thead>
                <tbody style="font-size: 16px; color: white">
                @foreach($newsletters as $index=>$newsletter)
                    <tr style="color: #9fcdff">
                        <td>{{ $newsletter->id }}</td>
                        <td>{{ $newsletter->title }}</td>
                        <td>{{ $newsletter->description }}</td>
                        <td @if($newsletter->status == 1)
                                style="color: green"
                            @elseif($newsletter->status == 0)
                                style="color: #ff1744"
                            @endif>{{ $newsletter->status == 1 ? "Send" : "Pending" }}</td>
                        <td><a type="submit" href="{{ url('/admin/newsletter_preview/'.$newsletter->id) }}" class="btn btn-success">Preview</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </table><br>
@endsection

@section('script')
    <script type="text/javascript">
        let array = [];
        let count = 0;

        $('#btn_add').click(function () {
            if (count < 6) {
                let advertisement_id = $('#advertisement_combo').val();
                let title = $('#option' + advertisement_id).attr('data-title');
                if (array.indexOf(advertisement_id) == -1) {
                    array.push(advertisement_id);
                    let string_array = array.join();
                    $('#array_data').val(string_array);
                    count++;
                    $('#title_area').append("<li id='display" + advertisement_id + "'>" + title  + "</li>" + "<br>");
                    $('#button_area').append("<li id='display" + advertisement_id +"btn"+ "'><button class='btn btn-danger' id='1' onclick='removeAdvertisement(" + advertisement_id + ")'>Remove</button></li>"+"<br>")
                } else {
                    alert("This Advertisement Has Been Already Added To The News Letter");
                }
            } else {
                alert("Limit has been Exceeded\nMaximum Advertisement Count is 6");
            }
        });

        function removeAdvertisement(id) {
            $('#display' + id).remove();
            $('#display' + id+"btn").remove();
            array.splice(array.indexOf(id.toString()),1);
        }
    </script>
@endsection
