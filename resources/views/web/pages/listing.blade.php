@extends('web.layouts.main_layout')

@section('content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="row listing-page-search-padding">
            <div class="container">
                <form id="cp-search-form" method="GET" action="{{route('search_ads')}}">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-location">
                                <select id="location" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="district">
                                    <option class="first" value="">Select Location</option>
                                    @foreach(config('constance.districts') as $districts)
                                        <option class="" value="{{ $districts }}" {{ $district === $districts ? 'selected' :'' }}>{{ $districts }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-category">
                                <div class="form-group search-input-area input-icon-category">
                                    <select id="categories" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="ad_type">
                                        <option class="first" value="all" {{$ad_type == 'all' ? 'selected' : ''}}>All</option>
                                        <option value="corporate" {{$ad_type == 'corporate' ? 'selected' : ''}}>Corporate</option>
                                        <option value="individual" {{$ad_type == 'individual' ? 'selected' : ''}}>Individual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-keywords">
                                <input placeholder="Enter Keywords here ..." value="{{$search_query}}" name="keyword" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                            <button type="submit" class="cp-search-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">{{$heading}}</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                    <div class="section-title-left-dark title-bar mt-20 mb-40">
                        <h2>{{$heading}}</h2>
                    </div>
                    <div class="row category-grid-layout2 zoom-gallery">
                        @foreach($advertisements as  $featuredAdsIndex => $advertisement)
                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                    <div class="product-box item-mb zoom-gallery">
                                        <div class="item-mask-wrapper">
                                            <div id="ad-box-img-wrapper" class="item-mask bg-body">

                                                <img src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}" alt="categories"
                                                     class="img-thumbnail ad-image">
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">{{config('constance.categories')[$advertisement->category_id]['sub_cat'][$advertisement->subcategory_id]['name']}}</div>
                                                <div class="middle" style="cursor: pointer">
                                                    <a href="{{url('/ad/'.config('constance.categories')[$advertisement
                                        ->category_id]['slug']).'/'.$advertisement->slug}}">
                                                        <img class="img-thumbnail" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ4OC43MjcsMEgzMDIuNTQ1Yy0xMi44NTMsMC0yMy4yNzMsMTAuNDItMjMuMjczLDIzLjI3M2MwLDEyLjg1MywxMC40MiwyMy4yNzMsMjMuMjczLDIzLjI3M2gxMjkuOTk3TDE5Mi45OTksMjg2LjA5ICAgIGMtOS4wODksOS4wODktOS4wODksMjMuODIzLDAsMzIuOTEyYzQuNTQzLDQuNTQ0LDEwLjQ5OSw2LjgxNiwxNi40NTUsNi44MTZjNS45NTYsMCwxMS45MTMtMi4yNzEsMTYuNDU3LTYuODE3TDQ2NS40NTUsNzkuNDU4ICAgIHYxMjkuOTk3YzAsMTIuODUzLDEwLjQyLDIzLjI3MywyMy4yNzMsMjMuMjczYzEyLjg1MywwLDIzLjI3My0xMC40MiwyMy4yNzMtMjMuMjczVjIzLjI3M0M1MTIsMTAuNDIsNTAxLjU4LDAsNDg4LjcyNywweiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5NS42MzYsMjMyLjcyN2MtMTIuODUzLDAtMjMuMjczLDEwLjQyLTIzLjI3MywyMy4yNzN2MjA5LjQ1NUg0Ni41NDVWMTM5LjYzNkgyNTZjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzMgICAgUzI2OC44NTMsOTMuMDkxLDI1Niw5My4wOTFIMjMuMjczQzEwLjQyLDkzLjA5MSwwLDEwMy41MTEsMCwxMTYuMzY0djM3Mi4zNjRDMCw1MDEuNTgsMTAuNDIsNTEyLDIzLjI3Myw1MTJoMzcyLjM2NCAgICBjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzNWMjU2QzQxOC45MDksMjQzLjE0Nyw0MDguNDg5LDIzMi43MjcsMzk1LjYzNiwyMzIuNzI3eiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">
                                                {{config('constance.categories')[$advertisement->category_id]['name']}}
                                            </div>

                                            <h3 class="short-title ellipsis" style="width: 80%">
                                                <a href="{{url('/ad/'.config('constance.categories')[$advertisement
                                        ->category_id]['slug']).'/'.$advertisement->slug}}">
                                                    {{$advertisement->title}}
                                                </a>
                                            </h3>
                                            <h3 class="long-title"><a href="#">{{$advertisement->title}}</a></h3>

                                            <ul class="upload-info">
                                                <li class="date">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>{{$advertisement->created_at}}
                                                </li>
                                            </ul>

                                            <p>{{$advertisement->description}}</p>

                                            <div class="price">{{$advertisement->price ? 'Rs '.number_format($advertisement->price) : "N/A"}}</div>

                                            <a href="#" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    {{--<div class="text-center">--}}
                        {{--{{ $advertisements->links() }}--}}
                    {{--</div>--}}


                </div>
                <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Categories</h3>
                            </div>
                            <ul class="sidebar-category-list">
                                @foreach($categories as $catIndex => $category)
                                    <li>
                                        <a data-toggle="collapse" href="{{'#subcat'.$catIndex}}">
                                            <img src="{{$category['icon']}}" alt="category" class="img-fluid">
                                            {{$category['name']}} ({{$category['count']}})
                                        </a>

                                    </li>
                                    <div id="{{'subcat'.$catIndex}}" class="panel-collapse collapse">
                                        <ul class="list-group">
                                            @foreach($category['sub_cat'] as $subCatIndex => $subCategory)
                                                <li class="list-group-item ellipsis">
                                                    <a href="{{url('/list/'.$category['sub_cat'][$subCatIndex]['slug'])}}">
                                                        <img src="{{$subCategory['image']}}" alt="category" class="img-fluid">
                                                        {{$subCategory['name']}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-accent s-space-equal overflow-hidden">
        <div class="container">
            <div class="row no-gutters text-center-mb">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-layout1-left d-flex align-items-center justify-content-center">
                        <h2>Do you Have Something To Advertise?</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="add-layout1-middle d-flex align-items-center justify-content-center text-center--md">
                        <h3>Post your ad on aluthads.lk</h3>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="add-layout1-right d-flex align-items-center justify-content-center">
                        <a href="{{route('view_post_ad')}}" class="cp-default-btn-sm">Post Your Ad Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-body s-space full-width-border-top">
        <div class="container">
            <div class="section-title-dark">
                <h2 class="size-sm">Receive The Best Offers</h2>
                <p>Stay in touch with aluthads.lk and we'll notify you about best ads</p>
            </div>
            <div class="input-group subscribe-area">
                <input type="text" placeholder="Type your e-mail address" class="form-control">
                <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Subscribe</button>
                </span>
            </div>
        </div>
    </section>
@endsection