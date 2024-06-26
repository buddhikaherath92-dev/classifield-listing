@extends('web.layouts.main_layout')
@section('content')
<style>
    .text-divider{margin: 2em 0; line-height: 0; text-align: center;}
    .text-divider span{background-color:  #E0DFDA  ; padding: 1em;}
    .text-divider:before{ content: " "; display: block; border-top: 1px solid #adb5bd; border-bottom: 1px solid #adb5bd;}
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}

    @media only screen and (max-width: 868px) {
        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }
    }

</style>

<section class="s-space-bottom-full bg-accent-shadow-body">
    <div class="container">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a> -</li>
                <li class="active">Who We Are</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2>What Is AluthAds.lk?</h2>
                    </div>
                    <div class="about-us gradient-padding">
                        <img src="{{asset('images/categories/about_us3.jpg')}}">
                        <p>
                        AluthAds.lk is a free classified ads website for Electronics, Cars & Vehicles, jobs, Properties , and everything else. Find what you're looking for or create your own ad for free! Unlike many other classified ads websites, AluthAds.lk is 100% free to use. Free to post an ad, free to browse listings, free to contact sellers. We invest a great deal of time and effort in monitoring and filtering the content posted to the website, so you can be confident that you'll find only quality, relevant listings. Our goal at AluthAds.lk is to make it as easy as possible to buy or sell anything.
                        </p>
                        <p>Consumers can easily browse and view all the advertisements by categories. They also have access to view the details of the advertiser under the profile section where who has published the advertisements, events and jobs.</p>
                        <h3>How does it work?</h3>
                        <p>If you are a seeker of advertising: we have different portals for the companies listed under different categories showing their advertisements, Items, Services and job vacancies.</p>
                        <p>If you want to advertise your things: first you have to register with us as a corporate user or Individual user
                            then you acquire to post your advertisement.</p>

                        <br>
                        <h3>Target audience?</h3>
                        <p>This is a unique website for everyone who loves shopping. Whether you love shopping  it is the place for it. If you are willing to provide & get services in education, hospital or others, we have separate sections for jobs & education.</p>

                        <br>
                        <h3>Vision</h3>
                        <p>To become the world’s preferred and the finest free classified platform. We continuously innovate to be the best destination for our customers and partners.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="sidebar-item-box">
                    <ul class="sidebar-more-option">
                        <li>
                            <a href="{{'/post_advertisement'}}"><img src="{{asset('web/img/contact/more1.png')}}">Post a Free Ad</a>
                        </li>
                        <li>
                            <a class="login-btn"data-toggle="modal" data-target="#myModal"><img src="{{asset('web/img/contact/more2.png')}}">Manage Product</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-item-box">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
