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

        @if($advertisement->is_inactive === 1)
        <div class="container">
            <div class="alert alert-danger" role="alert">
                This is <b>only a preview.</b> The advertisement is still inactive!
            </div>
        </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <h2>{{$advertisement->title}}</h2>
                        </div>
                        <div class="gradient-padding reduce-padding">
                            <div id="carouselExampleIndicators" class="carousel slide custom-carousel" data-ride="carousel">
                                @if($advertisement->price === null)
                                    <span class="price">Negotiable</span>
                                    @else
                                    <span class="price">{{'Rs '.number_format($advertisement->price)}}</span>
                                @endif
                                <ol class="carousel-indicators">
                                    @if($advertisement->img_1 !==null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    @endif
                                    @if($advertisement->img_2 !==null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    @endif
                                    @if($advertisement->img_3 !==null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    @endif
                                    @if($advertisement->img_4 !==null)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    @endif
                                </ol>
                                <div class="carousel-inner">
                                    @if($advertisement->img_1 !==null)
                                        <div class="carousel-item active text-center" >
                                            <img class="my-auto"
                                                 src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}"
                                                 alt="First slide">
                                        </div>
                                    @endif
                                    @if($advertisement->img_2 !==null)
                                        <div class="carousel-item text-center">
                                            <img class="my-auto"
                                                 src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_2}}"
                                                 alt="Second slide">
                                        </div>
                                    @endif
                                    @if($advertisement->img_3 !==null)
                                        <div class="carousel-item text-center">
                                            <img class="my-auto"
                                                 src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_3}}"
                                                 alt="Third slide">
                                        </div>
                                    @endif
                                        @if($advertisement->img_4 !==null)
                                            <div class="carousel-item text-center">
                                                <img class="my-auto"
                                                     src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_4}}"
                                                     alt="Fourth slide">
                                            </div>
                                        @endif
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <ul class="nav nav-pills justify-content-center bg-dark" id="gallery-nav">
                                @if($advertisement->img_1 !==null)
                                <li class="nav-item active" data-target="#carouselExampleIndicators" data-slide-to="0">
                                    <a class="nav-link" href="#">
                                        <img class="img-thumbnail"
                                             src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_1}}"
                                             alt="First slide">
                                    </a>
                                </li>
                                @endif
                                @if($advertisement->img_2 !==null)
                                    <li class="nav-item" data-target="#carouselExampleIndicators" data-slide-to="1">
                                        <a class="nav-link" href="#">
                                           <img class="img-fluid img-thumbnail"
                                                src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_2}}"
                                                alt="Second slide">
                                        </a>
                                    </li>
                                @endif
                                @if($advertisement->img_3 !==null)
                                    <li class="nav-item" data-target="#carouselExampleIndicators" data-slide-to="2">
                                        <a class="nav-link" href="#">
                                         <img class="img-thumbnail"
                                            src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_3}}"
                                             alt="Second slide">
                                        </a>
                                    </li>
                                @endif
                                @if($advertisement->img_4 !==null)
                                   <li class="nav-item" data-target="#carouselExampleIndicators" data-slide-to="3">
                                    <a class="nav-link" href="#">
                                      <img class="img-thumbnail"
                                         src="{{env('APP_URL').'images/advertisements/'.$advertisement->img_4}}"
                                             alt="Second slide">
                                   </a>
                                  </li>
                                @endif
                            </ul>
                            <br><br>
                            <div class="section-title-left-dark child-size-xl title-bar item-mb"
                                 style=" max-width: 100%;overflow-wrap: break-word;">
                                <h3>Ad Description:</h3>
                                <p class="text-medium-dark"><pre style="font-family: inherit; font-size: 18px"> {{ $advertisement['summary-ckeditor'] }}</pre></p>
                            </div>
                            <ul class="item-actions border-top">
                                {{--<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Save Ad</a></li>--}}
                                {{--<li><a href="{{route('share')}}"></i></i></a></li>--}}
                                {{--<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-facebook-official"></span></a></li>--}}
                                {{--<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id="">--}}
                                        {{--<i class="fas fa-share-alt"></i>--}}
                                        {{--Share ad</a></li>--}}
                                {{--<i class="fas fa-share-alt"aria-hidden="true">--}}

                                {{--<li><a href= "https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-button " id=""><span class="fa fa-facebook-official"></span>&nbsp;&nbsp;&nbsp;Share On facebook</a></li>--}}
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-button " id=""><span class="fa fa-facebook-official"></span>&nbsp;&nbsp;&nbsp;Share On facebook</a></li>
                                </li>

                                {{--<li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>--}}
                                <li><a href="#" data-toggle="modal" data-target="#modelRate"><i class="fa fa-star"
                                                                                                aria-hidden="true"></i>Rate</a>
                                </li>
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
                                <a href="{{route('view_post_ad')}}" class="cp-default-btn-sm-primary">Post Your Ad
                                    Now!</a>
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
                                        <img src="{{asset('web/img/user/user1.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Posted By</span>
                                            <h4>{{$seller->name}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/user3.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Contact Number</span>
                                            <h4>{{$seller->tel_no}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/user5.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>User Type</span>
                                            <h4>{{$seller->type == 1 ? 'Individual' : 'Corporate'}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/bank.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            @if($advertisement->category_id == 6)
                                                <span>Salary</span>
                                            @else
                                                <span>Price</span>
                                            @endif
                                            <h4>{{$price_type == 1 ? 'Negotiable':'Fixed'}}</h4>
                                        </div>
                                    </div>
                                </li>
{{--                                <li>--}}
{{--                                    <div class="media">--}}
{{--                                        <img src="{{asset('web/img/user/bank.png')}}" alt="user"--}}
{{--                                             class="img-fluid pull-left">--}}
{{--                                        <div class="media-body">--}}
{{--                                            <span>Price</span>--}}
{{--                                            <h4>{{$advertisement->price != null ? $advertisement->price : 'N/A'}}</h4>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/eye.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Views</span>
                                            <h4>{{$advertisement->views}}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="{{asset('web/img/user/star.png')}}" alt="user"
                                             class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Ratings</span>
                                            <br>
                                            @for($i=0; $i<5; ++$i)
                                                <h4 class="starRating"><i
                                                            class="fa fa-star{{($rating<=$i ? '-o' : '')}}"
                                                            aria-hidden="true"></i></h4>
                                            @endfor
                                            <h4>{{number_format((float)$rating, 1, '.', '')}}</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Related Ads</h3>
                            </div>
                            <ul class="sidebar-ads-from-user">
                                @foreach($seller_ads as $seller_ad)
                                    <li>
                                        <div class="media">
                                            <a href="{{url('/ad/'.config('constance.categories')[$seller_ad
                                        ->category_id]['slug']).'/'.$seller_ad->slug}}" class="pull-left">
                                                <img src="{{env('APP_URL').'images/advertisements/'.$seller_ad->img_1}}"
                                                     alt="categories" class="img-fluid"
                                                     style="width: 75px; height: 75px">
                                            </a>
                                            <div class="media-body" style="width: 30px">
                                                <h4 class="ellipsis"><a href="{{url('/ad/'.config('constance.categories')[$seller_ad
                                        ->category_id]['slug']).'/'.$seller_ad->slug}}">
                                                        {{$seller_ad->title}}</a></h4>
                                                <div class="place">
                                                    <img src="{{config('constance.categories')[$seller_ad->category_id]['sub_cat'][$seller_ad->subcategory_id]['image']}}"
                                                         alt="category" class="img-fluid"
                                                         style="width: 15px;height: 15px">
                                                    {{config('constance.categories')[$seller_ad->category_id]['sub_cat'][$seller_ad->subcategory_id]['name']}}
                                                </div>
                                                <div class="price ellipsis badge-pill badge-success text-center">{{$seller_ad->price != null ? 'Rs '.number_format($seller_ad->price) :  'N/A'}}</div>
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
        <!-- Modal -->
        <div class="modal fade" id="modelRate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" id="dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate Advertisement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" id="">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="modal-body">
                        <form action="{{route('rate_ad')}}" method="post" class="rating">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control" id="formGroupExampleInput" name="email"
                                       placeholder="Enter Your Email">
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input class="star" type="radio" name="rating" value="1"/>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input class="star" type="radio" name="rating" value="2"/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input class="star" type="radio" name="rating" value="3"/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input class="star" type="radio" name="rating" value="4"/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input class="star" type="radio" name="rating" value="5"/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                            </div>
                            <input type="hidden" name="slug" value="{{$advertisement->slug}}">
                            <button type="submit" class="btn btn-success form-control" name="ad_id"
                                    value="{{$advertisement->id}}">Rate
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
