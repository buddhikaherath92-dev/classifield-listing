@extends('web.layouts.dashboard_layout')

@section('child-content')
    <div class="gradient-wrapper item-mb border-none">
        <h2 class="title-section">My Ad List</h2>
        <div class="row mt-2 mb-2">
            <div class="col-md-12">
                <form class="form-inline" method="GET" action="{{route('my_ads')}}">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <select class="form-control" id="order_by" name="order_by">
                                <option value="created_at"
                                        {{ $order_by === 'created_at' ? 'selected' : '' }}>Created Date</option>
                                <option value="updated_at"
                                        {{ $order_by === 'updated_at' ? 'selected' : '' }}>Updated Date</option>
                                <option value="title"
                                        {{ $order_by === 'title' ? 'selected' : '' }}>Title(Alphabetical)</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <select class="form-control" id="status" name="status">
                                <option value="null"
                                        {{ $status === 'null' ? 'selected' : '' }}>All</option>
                                <option value="active"
                                        {{ $status === 'active' ? 'selected' : '' }}>Live</option>
                                <option value="inactive"
                                        {{ $status === 'inactive' ? 'selected' : '' }}>Pending Review / Inactive</option>
                                <option value="featured"
                                        {{ $status === 'featured' ? 'selected' : '' }}>Featured</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="category-view" class="pt-5">
            <div class="row">
                   <div class="col-sm-12">
                       <ul class="list-group">
                           @foreach($advertisements as $AdIndex => $advertisement)
                           <li class="list-group-item mb-3 p-0 ad-item-custom" >
                               <div class="row clearfix m-0">
                                   <div class="col-md-3 col-sm-12 my-auto text-center" style="background: #f5f6f5">
                                       <img style="height: 107px" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}"
                                            alt="categories" class="img-fluid">
                                   </div>
                                   <div class="col-md-9 col-sm-12 pl-0 pr-0">
                                       <div class="row clearfix p-2">
                                           <div class="col-md-8 col-sm-12 my-auto">
                                               <h4 class="text-center text-md-left ellipsis mb-0">{{$advertisement->title}}</h4>
                                           </div>
                                           <div class="col-md-4 col-sm-12 text-center text-md-right mt-2 mt-md-0">
                                               @if($advertisement->is_featured)
                                                   <span class="text-warning p-2">
                                                       <i class="fa fa-flash" aria-hidden="true"></i>
                                                       Featured
                                                  </span>
                                               @endif
                                               @if($advertisement->is_inactive === 0)
                                                   <span class="text-success p-2">
                                                       <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                       Active
                                                   </span>
                                               @endif
                                               @if($advertisement->is_inactive === 1)
                                                   <span class="text-danger p-2">
                                                       <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                       Inactive
                                                   </span>
                                               @endif
                                           </div>
                                       </div>
                                       <hr class="m-0">
                                       <div class="row clearfix p-2">
                                            <div class="col-md-8 col-sm-12 text-center text-md-left mt-2 mt-md-0">
                                                <span class="badge badge-light p-2 text-primary">
                                                    <img class="img-fluid" width="12px" src="{{config('constance.categories')[$advertisement->category_id]['image']}}">
                                                {{config('constance.categories')[$advertisement->category_id]['name']}}
                                                </span>
                                                <span class="badge badge-light p-2 text-primary">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$advertisement->created_at}}
                                                </span>
                                                <span class="badge badge-light p-2 text-primary">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> {{$advertisement->views}}
                                                </span>
                                            </div >
                                            <div class="col-md-4 col-sm-12 text-center text-md-right mt-2 mt-md-0">
                                                <a class="btn btn-sm btn-info text-white"
                                                   data-toggle="tooltip" data-placement="bottom" title="View"
                                                   href="{{url('/ad/'.config('constance.categories')[$advertisement
                                        ->category_id]['slug']).'/'.$advertisement->slug}}" target="_blank">
                                                    <i class="fa fa-expand" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-sm btn-warning text-white"
                                                   href="{{url('/my_dashboard/edit_ad/'.$advertisement->id)}}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger text-white"
                                                   href="{{url('/my_dashboard/delete_ad/'.$advertisement->id)}}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                       </div>

                                   </div>
                               </div>
                           </li>
                           @endforeach
                       </ul>
                   </div>




            </div>
        </div>
    </div>
    <div class="gradient-wrapper mb--xs mb-30 border-none text-center">
        <a href="{{route('view_post_ad')}}" class="cp-default-btn">Post Your Ad</a>
    </div>
@endsection
