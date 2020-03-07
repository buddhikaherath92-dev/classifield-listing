@extends('admin.layouts.default')

@section('child-content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Add New Banner Ad
        </button>

        <br><br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new Banner ad</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: red; font-size: 35px; right: 5px">
                            <span aria-hidden="true" style="float: right; right: 0">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin_newsletters_store') }}" method="post" id="newsletter_form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="page_select">Page :</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="page_select" name="page">
                                        @foreach($pages as $index => $page)
                                            <option value="{{ $index }}">{{$page}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="location_select">Location :</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="location_select" name="location">
                                        @foreach($locations as $index => $location)
                                            <option value="{{ $index }}">{{$location}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="img_ad">Ad :</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="img_ad"
                                           name="img" value="{{ old('img') }}">
                                    <img id="img_1_preview" class="img-thumbnail" style="max-height: 50px; max-width: 100px; margin: 5px; display: none" />

                                    <span class="invalid-feedback" id="img_error">
                                                    <small>Ad Image is required!</small>
                                                </span>

                                    @if ($errors->has('img_1'))
                                        <span class="invalid-feedback" style="display: block">
                                                                <small>{{ $errors->first('img_1') }}</small>
                                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="exDate">Expire Date :</label>
                                <input type="date" id="exDate"
                                       value="{{ \Carbon\Carbon::now()->addDays(10)->toDateString()}}" class="form-control" name="expire_date">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="exDate">Ad Status :</label>
                                <select class="form-control" id="status_select" name="is_active">
                                    <option value="true">Active</option>
                                    <option value="false">Inactive</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Add</button>
                            <button class="btn btn-info" type="reset">Clear Data</button>
                        </form>
                    </div>

                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Banner Id</th>
                    <th scope="col">Page</th>
                    <th scope="col">Location</th>
                    <th scope="col">Ad Image</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Ad Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody style="font-size: 16px; color: white">
{{--                @foreach($newsletters as $index=>$newsletter)--}}
{{--                    <tr style="color: #9fcdff">--}}
{{--                        <td>{{ $newsletter->id }}</td>--}}
{{--                        <td>{{ $newsletter->title }}</td>--}}
{{--                        <td>{{ $newsletter->description }}</td>--}}
{{--                        <td @if($newsletter->status == 1)--}}
{{--                            style="color: green"--}}
{{--                            @elseif($newsletter->status == 0)--}}
{{--                            style="color: #ff1744"--}}
{{--                                @endif>{{ $newsletter->status == 1 ? "Sent" : "Pending" }}</td>--}}
{{--                        <td><a type="submit" href="{{ url('/admin/newsletter_preview/'.$newsletter->id) }}" class="btn btn-success">Preview</a></td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </table>
    <script type="text/javascript">
        $("#img_ad").change(function() {
            readURL(this, 'img_1_preview');
        });

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
    </script>
@endsection


