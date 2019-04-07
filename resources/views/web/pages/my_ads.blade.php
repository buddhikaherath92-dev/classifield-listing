@extends('web.layouts.dashboard_layout')

@section('child-content')
    <div class="gradient-wrapper item-mb border-none">
        <div class="gradient-title">
            <div class="row no-gutters">
                <div class="col-4 text-center-mb">
                    <h2 class="mb10--mb">My Ad List</h2>
                </div>
                {{--<div class="col-8">--}}
                {{--<div class="layout-switcher float-none-mb text-center-mb mb10--mb">--}}
                {{--<ul>--}}
                {{--<li class="active"><a href="#" data-type="category-list-layout3" class="product-view-trigger"><i class="fa fa-th-large"></i></a></li>--}}
                {{--<li><a href="#" data-type="category-grid-layout3" class="product-view-trigger"><i class="fa fa-list"></i></a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
            <div class="row">

                @foreach($advertisements as $AdIndex => $advertisement)

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="product-box item-mb zoom-gallery">

                            <div class="item-mask-wrapper">

                                <div id="ad-box-img-wrapper" class="item-mask bg-body">

                                    <img src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}" alt="categories"
                                         class="img-thumbnail">
                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                    <div class="title-ctg">{{config('constance.categories')[$advertisement->category_id]['name']}}</div>

                                    <div class="symbol-featured @if($advertisement->is_featured) active @endif">
                                        <img src="https://radiustheme.com/demo/html/classipost/classipost/img/banner/symbol-featured.png" alt="symbol" class="img-fluid">
                                    </div>
                                </div>

                            </div>

                            <div class="item-content" style="width: 80%">
                                <div class="title-ctg">
                                    {{config('constance.categories')[$advertisement->category_id]['name']}}
                                </div>

                                <h3 class="short-title ellipsis" style="width: 55%"><a href="#" style="overflow-wrap: break-word;">{{$advertisement->title}}</a></h3>
                                <h3 class="long-title ellipsis" style="width: 55%"><a href="#" style="overflow-wrap: break-word;">{{$advertisement->title}}</a></h3>

                                <ul class="upload-info">
                                    <li class="place">
                                        @if($advertisement->is_inactive === 0)
                                            <i class="fa fa-check-circle" aria-hidden="true"></i><span style="color: #0b9876">Active</span>
                                        @endif
                                        @if($advertisement->is_inactive === 1)
                                            <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i><span style="color: red">Inactive</span>
                                        @endif
                                    </li>
                                    <li class="date" id="createDate">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>{{$advertisement->created_at}}
                                    </li>
                                    <li class="tag-ctg">
                                        <i class="fa fa-tag" aria-hidden="true"></i>{{config('constance.categories')[$advertisement->category_id]['name']}}
                                    </li>
                                </ul>

                                <p class="ellipsis">{{$advertisement->description}}</p>

                                <div id="price" class="price ellipsis">{{$advertisement->price != null ? 'Rs '.number_format($advertisement->price):'N/A'}}</div>

                                <a href="{{url('/ad/'.config('constance.categories')[$advertisement
                                        ->category_id]['slug']).'/'.$advertisement->slug}}" class="product-details-btn" id="product-btn">Details</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <div class="gradient-wrapper mb--xs mb-30 border-none text-center">
        <a href="{{route('view_post_ad')}}" class="cp-default-btn">Post Your Ad</a>
    </div>
@endsection
