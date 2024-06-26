@extends('admin.layouts.default')

@section('child-content')

    <div class="card mb-3">
        <div class="card-header">
            <form action="{{route('admin_advertisements')}}" method="GET" class="form-horizontal">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <select class="form-control" name="filter">
                            <option value="all" @if(app('request')->input('filter') === 'all') selected @endif >
                                ALL
                            </option>
                            <option value="active" @if(app('request')->input('filter') === 'active') selected @endif >
                                Active
                            </option>
                            <option value="inactive" @if(app('request')->input('filter') === 'inactive') selected @endif >
                                Inactive
                            </option>
                            <option value="featured" @if(app('request')->input('filter') === 'featured') selected @endif >
                                Featured
                            </option>
                            <option value="non-featured" @if(app('request')->input('filter') === 'non-featured') selected @endif >
                                Non-Featured
                            </option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <button type="submit" class="form-control btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Filter">
                            <i class="fas fa-fw fa-sync"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Posted By</th>
                        <th>Status</th>
                        <th>Expired on</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>



                    <tbody>
                    @foreach($advertisements as $index => $advertisement)
                        <tr>
                            <td>{{$advertisement->title}}</td>
                            <td>{{config('constance.categories')[$advertisement->category_id]['name']}}</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fa fa-user-tie mr-2"></i> {{$advertisement->username}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-envelope mr-2"></i> {{$advertisement->user_email}}
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-phone-square mr-2"></i> {{$advertisement->user_tel}}
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{$advertisement->is_featured == 1 ? 'Featured Ad' : 'Free Ad'}}
                                    </li>
                                    <li class="list-group-item">
                                        {{$advertisement->is_inactive == 1 ? 'Inactive' : 'Active'}}
                                    </li>
                                </ul>
                            </td>
                            <td>{{$advertisement->expire_date}}</td>
                            <td>
                                {{$advertisement->created_at}}
                            </td>
                            <td>
                                {{$advertisement->updated_at}}
                            </td>
                            <td class="text-center">
                                @if( $advertisement->is_inactive == 1 )
                                <span data-toggle="modal" id="confirmModelLink" data-target="#ConfirmModel"
                                    data-from="active" data-id="{{$advertisement->id}}">
                                    <a class="btn btn-primary" data-placement="top" title="MAKE ACTIVE">
                                        <i class="fas fa-fw fa-check-circle" style="color: white"></i>
                                    </a> |
                                </span>
                                @endif

                                @if( $advertisement->is_inactive == 0 )
                                <span data-toggle="modal" id="confirmModelLink" data-target="#ConfirmModel"
                                              data-from="inactive" data-id="{{$advertisement->id}}">
                                    <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="MAKE INACTIVE">
                                        <i class="fas fa-fw fa-times-circle" style="color: white"></i>
                                    </a>
                                 </span> |
                                @endif

                                @if( $advertisement->is_featured == 0 )
                                        <span data-toggle="modal" id="confirmModelLink" data-target="#ConfirmModel"
                                              data-from="featured" data-id="{{$advertisement->id}}">
                                            <a class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="MAKE FEATURED">
                                                <i class="fas fa-fw fa-fire" style="color: white"></i>
                                            </a> |
                                        </span>
                                @endif
                                <span data-toggle="modal" id="ExpireDateModelLink" data-target="#ExpireDateModel"
                                   data-id="{{$advertisement->id}}" data-expire="{{$advertisement->expire_date}}">
                                        <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="SET EXPIRE DATE">
                                            <i class="fas fa-fw fa-clock" style="color: white"></i>
                                        </a>
                                </span> |
                                <a class="btn btn-primary" href="{{URL('/admin/view_advertisement?id='.$advertisement->id)}}"
                                   data-toggle="tooltip" data-placement="top" title="PREVIEW">
                                    <i class="fas fa-fw fa-eye" style="color: white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="ConfirmModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmTitle"></h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="messageLabel"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin_advertisements_update') }}" method="POST">
                        @csrf

                        <input id="variation" name="" type="hidden" value="">
                        <input name="id" id="adId" type="hidden" value="">

                        <button type="submit" class="btn btn-primary" id="submitBtn"></button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ExpireDateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Expire Date</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please select the expire date for the selected advertisement. You can change this any time.</p>

                    <form action="{{ route('admin_advertisements_update') }}" method="POST">

                        @csrf

                        <input type="date" id="exDate" class="form-control" name="expire_date">

                        <input name="id" id="exId" type="hidden" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-clock" aria-hidden="true"></i> Set Expire Date
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on("click", "#confirmModelLink", function () {

            var id = $(this).data('id');

            var active_message = "Select \"Active\" below if you want to active selected advertisement. " +
                "Advertisement posted user will be notified via email";
            var active_title = "Want to active this advertisement?";

            var inactive_message = "Select \"Inactive\" below if you want to inactive selected advertisement. " +
                "Advertisement posted user will be notified via email";
            var inactive_title = "Want to inactive this advertisement?";

            var featured_message = "Select \"Make Featured\" below if you want to make this advertisement featured." +
                "Advertisement posted user will be notified via email";
            var featured_title = "Want to featured this advertisement?";



            if($(this).data('from') === 'active'){
                document.getElementById("confirmTitle").innerHTML = active_title;
                document.getElementById("messageLabel").innerHTML = active_message;
                document.getElementById("submitBtn").innerHTML = "<i class=\"fa fa-check-circle\" aria-hidden=\"true\"></i> Active";
                $("#adId").val(id);
                $("#variation").attr('name', 'is_inactive');
                $("#variation").val(0);
            }

            if($(this).data('from') === 'inactive'){
                document.getElementById("confirmTitle").innerHTML = inactive_title;
                document.getElementById("messageLabel").innerHTML = inactive_message;
                document.getElementById("submitBtn").innerHTML = "<i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i> Inactive";
                $("#adId").val(id);
                $("#variation").attr('name', 'is_inactive');
                $("#variation").val(1);
            }

            if($(this).data('from') === 'featured'){
                document.getElementById("confirmTitle").innerHTML = featured_title;
                document.getElementById("messageLabel").innerHTML = featured_message;
                document.getElementById("submitBtn").innerHTML = "<i class=\"fa fa-fire\" aria-hidden=\"true\"></i> Make Featured";
                $("#adId").val(id);
                $("#variation").attr('name', 'is_featured');
                $("#variation").val(1);
            }

        });

        $(document).on("click", "#ExpireDateModelLink", function () {
            var exId = $(this).data('id');
            var exDate = $(this).data('expire');
            $("#exId").val(exId);
            $("#exDate").val(exDate);
        });

        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#exDate').attr('min', maxDate);
        });
    </script>


@endsection
