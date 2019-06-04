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
                <li class="active">Help & FAQ</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
            <div class="gradient-wrapper mb--sm">
                            <div class="gradient-title">
                                <h2>Faq</h2>
                            </div>
                            <div class="faq-page gradient-padding">
                                <h3>Frequently Asked Questions</h3>
                                <p>
                                Most questions associated to AlthAds.lk can be answered by our knowledgeable and friendly support team. Feel free to contact us with your inquiry and we will do our best to help. 
                                </p>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Post to Classifieds</a>
                                            </div>
                                        </div>
                                        <div aria-expanded="false" id="collapseOne" role="tabpanel" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <h3>Can I post ads on this site for free?</h3>
                                                <p>
                                                Yes. You can post free classified ads and you can view all ads on categories available on this site. Our team is dedicated to provide you with the best service possible.
                                                </p>
                                                <h3>How can I post to classifieds? </h3>
                                                <p>
                                                You will have the option of posting to classifieds from within your account. Initially you need to register as an individual or corporate user. After that you have the opportunity to post your own ads. 
                                                </p>
                                                <h3>Can I repost my listing? </h3>
                                                <p>
                                                Yes. There is no limit on posting ads of you can do.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. My question not listed here</a>
                                            </div>
                                        </div>
                                        <div aria-expanded="false" id="collapseTwo" role="tabpanel" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <h3>Where can I seek for an answer to my question?</h3>
                                                <p>
                                                Use the <a href="/contact">contact us</a> page to ask any other questions. We are always open to hear public feedback as well. Our team will be happy to respond to your questions.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
