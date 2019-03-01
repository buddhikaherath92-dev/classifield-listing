@extends('web.layouts.main_layout')

@section('content')
    <section class="s-space-bottom-full bg-accent-shadow-body">

        <!-- Where Begin -->
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">{{$category}}</li>
                </ul>
            </div>
        </div>
        <!-- Where End -->

        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <h2>{{$advertisement->title}}</h2>
                        </div>
                        <div class="gradient-padding reduce-padding">
                            <div class="single-product-img-layout1 d-flex mb-50">
                                <ul class="nav tab-nav tab-nav-list">

                                    @if($advertisement->img_1 !== null)
                                    <li class="nav-item">
                                        <a class="active" href="#related1" data-toggle="tab" aria-expanded="false">
                                            <img alt="related1" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}"
                                                 class="img-fluid">
                                        </a>
                                    </li>
                                    @endif

                                    @if($advertisement->img_2 !== null)
                                    <li class="nav-item">
                                        <a href="#related2" data-toggle="tab" aria-expanded="false">
                                            <img alt="related2" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_2}}"
                                                 class="img-fluid">
                                        </a>
                                    </li>
                                    @endif

                                    @if($advertisement->img_2 !== null)
                                    <li class="nav-item">
                                        <a href="#related3" data-toggle="tab" aria-expanded="false">
                                            <img alt="related3" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_3}}"
                                                 class="img-fluid">
                                        </a>
                                    </li>
                                    @endif

                                </ul>
                                <div class="tab-content">

                                    @if($advertisement->price !== null)
                                    <span class="price">{{'Rs '.number_format($advertisement->price)}}</span>
                                    @endif

                                    @if($advertisement->img_1 !== null)
                                    <div class="tab-pane fade active show" id="related1">
                                        <a href="#" class="zoom ex1">
                                            <img alt="single" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}" class="img-fluid">
                                        </a>
                                    </div>
                                    @endif

                                    @if($advertisement->img_2 !== null)
                                    <div class="tab-pane fade" id="related2">
                                        <a href="#" class="zoom ex1">
                                            <img alt="single" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_2}}" class="img-fluid">
                                        </a>
                                    </div>
                                    @endif

                                    @if($advertisement->img_3 !== null)
                                    <div class="tab-pane fade" id="related3">
                                        <a href="#" class="zoom ex1">
                                            <img alt="single" src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_3}}" class="img-fluid">
                                        </a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                <h3>Ad Description:</h3>
                                <p class="text-medium-dark">{{$advertisement->description}}</p>
                            </div>
                            <ul class="item-actions border-top">
                                <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Save Ad</a></li>
                                <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
                                <li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="add-layout2-left d-flex align-items-center">
                                <div>
                                    <h2>Do you Have Something To Sell?</h2>
                                    <h3>Post your ad on aluthads.lk</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                <a href="{{route('view_post_ad')}}" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Seller Information</h3>
                            </div>
                            <ul class="sidebar-seller-information">
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/user1.png')}}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Posted By</span>
                                            <h4>{{$seller->name}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/user3.png')}}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Contact Number</span>
                                            <h4>{{$seller->tel_no}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/user5.png')}}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>User Type</span>
                                            <h4>{{$seller->type == 1 ? 'Individual' : 'Corporate'}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/bank.png')}}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Price</span>
                                            <h4>{{$price_type == 1 ? 'Negotiable':'Fixed'}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/eye.png')}}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Views</span>
                                            <h4>{{$advertisement->views}}</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>More Ads From User</h3>
                            </div>
                            <ul class="sidebar-ads-from-user">
                                @foreach($seller_ads as $seller_ad)
                                    <li>
                                        <div class="media">
                                            <a href="{{url('/ad/'.config('constance.categories')[$seller_ad
                                        ->category_id]['slug']).'/'.$seller_ad->slug}}" class="pull-left">
                                                <img src="{{env('APP_URL').'images/advertisements/'.$seller_ad->img_1}}"
                                                     alt="categories" class="img-fluid" style="width: 75px; height: 75px">
                                            </a>
                                            <div class="media-body" style="width: 30px">
                                                <h4 class="ellipsis"><a href="{{url('/ad/'.config('constance.categories')[$seller_ad
                                        ->category_id]['slug']).'/'.$seller_ad->slug}}">
                                                        {{$seller_ad->title}}</a></h4>
                                                <div class="place">
                                                    <img src="{{config('constance.categories')[$seller_ad->category_id]['sub_cat'][$seller_ad->subcategory_id]['image']}}"
                                                         alt="category" class="img-fluid" style="width: 15px;height: 15px">
                                                    {{config('constance.categories')[$seller_ad->category_id]['sub_cat'][$seller_ad->subcategory_id]['name']}}
                                                </div>
                                                <div class="price">{{$seller_ad->price ? 'Rs '.number_format($seller_ad->price) :  'N/A'}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Safety Tips for Buyers</h3>
                            </div>
                            <ul class="sidebar-safety-tips">
                                <li>Meet seller at a public place</li>
                                <li>Check The item before you buy</li>
                                <li>Pay only after collecting The item</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection