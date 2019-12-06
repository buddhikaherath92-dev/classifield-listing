@extends('web.layouts.main_layout')

@section('content')

    <section class="bg-accent fixed-menu-mt featured-product-area item-pb">
        <div class="container">
            <div class="row featured-product-inner-area zoom-gallery">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                    <div class="container search-padding">
                        <form id="cp-search-form" method="GET" action="{{route('search_ads')}}">
                            <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group search-input-area input-icon-location">
                                            <div id="SelectLocation" class="form-group search-input-area input-icon-location">
                                                <select id="location" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="district">
                                                    <option class="first" value="">Select Location</option>
                                                    @foreach(config('constance.districts') as $districts)
                                                        <option class="" value="{{ $districts }}" {{ $district === $districts ? 'selected' :'' }}>{{ $districts }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group search-input-area input-icon-category">
                                            <div id="SelectLocation" class="form-group search-input-area input-icon-category">
                                                <select id="categories" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="p_cat">
                                                    <option class="first" value="all">Select Category</option>
                                                    @foreach($categories as $catIndex => $category)
                                                        <option class="" value="{{ $category['id'] }}"
                                                                {{ $p_cat === $category['id'] ? 'selected' :'' }}>{{ $category['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div id="SelectLocation" class="form-group search-input-area input-icon-keywords">
                                            <input placeholder="Enter Keywords here ..." value="" name="keyword" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-right text-left-mb" >
                                        <button type="submit" class="cp-search-btn">
                                            <i class="fa fa-search " aria-hidden="true"></i>
                                        </button>
                                    </div>
                            </div>
                        </form>
                    </div>
                    <div class="section-title-left-dark title-bar mt-20 mb-40">
                        <h2>Featured Advertisements</h2>
                    </div>
                    @if(count($featured_advertisements) === 0 )
                        {{---------------------------------}}

                        <div class="alert alert-success" role="alert">There are no featured advertisements at this movement</div>



                        {{------------------------------}}

                    @endif
                    <div class="cp-carousel nav-control-top category-grid-layout2" data-loop="true" data-items="3"
                         data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000"
                         data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                         data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                         data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2"
                         data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="true"
                         data-r-large-dots="false">
                        @foreach($featured_advertisements as  $featuredAdsIndex => $featured_advertisement)
                                <div class="product-box item-mb zoom-gallery" id="featured-ad-box">
                                    <div class="item-mask-wrapper">
                                        <div id="ad-box-img-wrapper" class="item-mask">
                                            <a href="{{url('/ad/'.config('constance.categories')[$featured_advertisement
                                        ->category_id]['slug']).'/'.$featured_advertisement->slug}}">
                                                <img src="{{env('APP_URL').'images/advertisements/'.$featured_advertisement->img_1}}"
                                                     alt="categories" class="img-thumbnail ad-image" >
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">{{config('constance.categories')[$featured_advertisement->category_id]['sub_cat'][$featured_advertisement->subcategory_id]['name']}}</div>
                                                <div class="symbol-featured"><img src="{{asset('web/img/banner/symbol-featured.png')}}" alt="symbol" class="img-fluid"> </div>
                                                <div class="middle" style="cursor: pointer">
                                                    <img class="img-thumbnail" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ4OC43MjcsMEgzMDIuNTQ1Yy0xMi44NTMsMC0yMy4yNzMsMTAuNDItMjMuMjczLDIzLjI3M2MwLDEyLjg1MywxMC40MiwyMy4yNzMsMjMuMjczLDIzLjI3M2gxMjkuOTk3TDE5Mi45OTksMjg2LjA5ICAgIGMtOS4wODksOS4wODktOS4wODksMjMuODIzLDAsMzIuOTEyYzQuNTQzLDQuNTQ0LDEwLjQ5OSw2LjgxNiwxNi40NTUsNi44MTZjNS45NTYsMCwxMS45MTMtMi4yNzEsMTYuNDU3LTYuODE3TDQ2NS40NTUsNzkuNDU4ICAgIHYxMjkuOTk3YzAsMTIuODUzLDEwLjQyLDIzLjI3MywyMy4yNzMsMjMuMjczYzEyLjg1MywwLDIzLjI3My0xMC40MiwyMy4yNzMtMjMuMjczVjIzLjI3M0M1MTIsMTAuNDIsNTAxLjU4LDAsNDg4LjcyNywweiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5NS42MzYsMjMyLjcyN2MtMTIuODUzLDAtMjMuMjczLDEwLjQyLTIzLjI3MywyMy4yNzN2MjA5LjQ1NUg0Ni41NDVWMTM5LjYzNkgyNTZjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzMgICAgUzI2OC44NTMsOTMuMDkxLDI1Niw5My4wOTFIMjMuMjczQzEwLjQyLDkzLjA5MSwwLDEwMy41MTEsMCwxMTYuMzY0djM3Mi4zNjRDMCw1MDEuNTgsMTAuNDIsNTEyLDIzLjI3Myw1MTJoMzcyLjM2NCAgICBjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzNWMjU2QzQxOC45MDksMjQzLjE0Nyw0MDguNDg5LDIzMi43MjcsMzk1LjYzNiwyMzIuNzI3eiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-desc-wrapper">
                                            <div class="item-desc-title text-center ellipsis">
                                                {{$featured_advertisement->title}}
                                            </div>
                                            <div class="item-pirce text-center">
                                                {{$featured_advertisement->price ? 'Rs '.number_format($featured_advertisement->price).' (Fixed)' :  'Negotiable'}}
                                            </div>
                                            <div class="item-views-date">
                                                <div class="item-date text-center">
                                                    {{ucwords(trans($featured_advertisement->created_at->diffForHumans()))}}
                                                </div>
                                                <div class="item-views text-center">
                                                    <span class="fa fa-eye"></span> {{$featured_advertisement->views}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                    </div>

                </div>
                <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="category-menu-layout2 bg-body">
                        <h3>Categories</h3>
                        <ul class="sidebar-category-list">
                            @foreach($categories as $catIndex => $category)
                                <li>
                                    <a data-toggle="collapse" href="{{'#subcat'.$catIndex}}">
                                        <img src="{{$category['icon']}}" alt="category" class="img-fluid">
                                        <b>{{$category['name']}}</b> ({{$category['count']}})
                                    </a>

                                </li>
                                <div id="{{'subcat'.$catIndex}}" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        @foreach($category['sub_cat'] as $subCatIndex => $subCategory)
                                            <li class="list-group-item ellipsis">
                                                <a href="{{url('/list/'.$category['sub_cat'][$subCatIndex]['slug'])}}">
                                                    <img src="{{$subCategory['image']}}" alt="category" class="img-fluid" style="width: 20px">
                                                    {{ $subCategory['name'] === 'All' ? '('.$category['count'].')' : '('.$subCategory['sub_count'].')'}}  {{$subCategory['name']}}
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
    </section>

    <section class="bg-accent">
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

    <section class="bg-accent s-space-custom4">
        <div class="container">
            <div class="section-title-left-dark title-bar mb-40">
                <h2>Recently Added</h2>
            </div>
            <div class="row category-grid-layout2 zoom-gallery">
                @if(count($recent_advertisements) === 0 )

                    {{---------------------------------}}

                    <div class="alert alert-success" role="alert" style="margin-left: 15px">There are no recently advertisement at this movement.</div>


                    {{------------------------------}}
                @endif

                @foreach($recent_advertisements as $recentAdsIndex => $recent_advertisement)

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-box item-mb zoom-gallery">
                            <div class="item-mask-wrapper">
                                <div id="ad-box-img-wrapper" class="item-mask">
                                    <a href="{{url('/ad/'.config('constance.categories')[$recent_advertisement
                                        ->category_id]['slug']).'/'.$recent_advertisement->slug}}">
                                    <img src="{{env('APP_URL').'images/advertisements/'.$recent_advertisement->img_1}}"
                                         alt="categories" class="img-thumbnail ad-image" >
                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                    <div class="title-ctg">{{config('constance.categories')[$recent_advertisement->category_id]['sub_cat'][$recent_advertisement->subcategory_id]['name']}}</div>
                                    <div class="symbol-featured {{ $recent_advertisement->is_featured ? 'active' : '' }}" ><img src="{{asset('web/img/banner/symbol-featured.png')}}" alt="symbol" class="img-fluid"> </div>
                                    <div class="middle" style="cursor: pointer">
                                            <img class="img-thumbnail" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ4OC43MjcsMEgzMDIuNTQ1Yy0xMi44NTMsMC0yMy4yNzMsMTAuNDItMjMuMjczLDIzLjI3M2MwLDEyLjg1MywxMC40MiwyMy4yNzMsMjMuMjczLDIzLjI3M2gxMjkuOTk3TDE5Mi45OTksMjg2LjA5ICAgIGMtOS4wODksOS4wODktOS4wODksMjMuODIzLDAsMzIuOTEyYzQuNTQzLDQuNTQ0LDEwLjQ5OSw2LjgxNiwxNi40NTUsNi44MTZjNS45NTYsMCwxMS45MTMtMi4yNzEsMTYuNDU3LTYuODE3TDQ2NS40NTUsNzkuNDU4ICAgIHYxMjkuOTk3YzAsMTIuODUzLDEwLjQyLDIzLjI3MywyMy4yNzMsMjMuMjczYzEyLjg1MywwLDIzLjI3My0xMC40MiwyMy4yNzMtMjMuMjczVjIzLjI3M0M1MTIsMTAuNDIsNTAxLjU4LDAsNDg4LjcyNywweiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5NS42MzYsMjMyLjcyN2MtMTIuODUzLDAtMjMuMjczLDEwLjQyLTIzLjI3MywyMy4yNzN2MjA5LjQ1NUg0Ni41NDVWMTM5LjYzNkgyNTZjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzMgICAgUzI2OC44NTMsOTMuMDkxLDI1Niw5My4wOTFIMjMuMjczQzEwLjQyLDkzLjA5MSwwLDEwMy41MTEsMCwxMTYuMzY0djM3Mi4zNjRDMCw1MDEuNTgsMTAuNDIsNTEyLDIzLjI3Myw1MTJoMzcyLjM2NCAgICBjMTIuODUzLDAsMjMuMjczLTEwLjQyLDIzLjI3My0yMy4yNzNWMjU2QzQxOC45MDksMjQzLjE0Nyw0MDguNDg5LDIzMi43MjcsMzk1LjYzNiwyMzIuNzI3eiIgZmlsbD0iIzc3YzczMiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                    </div>
                                    </a>
                                </div>
                                <div class="item-desc-wrapper">
                                    <div class="item-desc-title text-center ellipsis">
                                        {{$recent_advertisement->title}}
                                    </div>
                                    <div class="item-pirce text-center">
                                        {{$recent_advertisement->price ? 'Rs '.number_format($recent_advertisement->price).' (Fixed)' :  'Negotiable'}}
                                    </div>
                                    <div class="item-views-date">
                                        <div class="item-date text-center">
                                            {{ucwords(trans($recent_advertisement->created_at->diffForHumans()))}}
                                        </div>
                                        <div class="item-views text-center">
                                            <span class="fa fa-eye"></span> {{$recent_advertisement->views}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-body s-space-default">
        <div class="container">
            <div class="section-title-dark">
                <h2>Start Earning From Things You Don’t Need Anymore</h2>
                <p>It’s very Simple to choose pricing &amp; Plan</p>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Free Post</div>
                        <div class="price">
                            <span class="currency">Rs.</span>0
                            <span class="duration">/ Per mo</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Always FREE Ad Posting</h3>
                        <p>Post as many ads as you like for 30 days. 100% FREE SUBMIT AD</p>
                        <a href="{{route('view_post_ad',['ad'=>'Free'])}}" >
                            <button class="cp-default-btn-lg" type="submit">Submit Ad</button>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="other-option bg-primary">or</div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Premium Post</div>
                        <div class="price">
                            <span class="currency">Rs.</span>500
                            <span class="duration">/ Per mo</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Featured Ad Posting</h3>
                        <p>Post as many ads as you like for 30 days without limitations and keep it on the top of our
                            index</p>
                        <a href="{{route('view_post_ad',['ad'=>'Premium'])}}" >
                            <button class="cp-default-btn-lg" type="submit">Submit Ad</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overlay-default s-space-equal overflow-hidden" style="background-image: url('{{asset('web/img/banner/counter-back1.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="{{asset('web/img/banner/counter1.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title" data-num="{{ $advertisement_count }}">1,00,000</div>
                            <h3 class="title-regular-light">Advertisements</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="{{asset('web/img/banner/counter2.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title" data-num="{{ $pin = mt_rand(1000, 9999)}}">5,00,000</div>
                            <h3 class="title-regular-light">Visitors Per Month</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="{{asset('web/img/banner/counter3.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title" data-num="{{ $users_count }}">2,00,000</div>
                            <h3 class="title-regular-light">Verified advertisers</h3>
                        </div>
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
            <form class="input-group subscribe-area" action="{{ route('subscribe') }}" method="post">
                {{csrf_field()}}
                <input id="email_subscribe" name="email_subscribe" type="text" placeholder="Type your e-mail address" class="form-control">
                <span class="input-group-addon">
                        <button id="btn_subscribe" type="submit" class="cp-default-btn-xl">Subscribe</button>
                </span>
            </form>
        </div>
    </section>

@endsection
