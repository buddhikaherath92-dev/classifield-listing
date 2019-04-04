@extends('web.layouts.main_layout')
@section('content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">Contact Page</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper mb--sm">
                        <div class="gradient-title">
                            <h2>Contact With us</h2>
                        </div>
                        <div class="contact-layout1 gradient-padding">
                            <div class="google-map-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15870.749048536823!2d80.20424339647528!3d6.037582987634962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae173bcaabaebbf%3A0xd1b262b2017f3b88!2sPeople&#39;s+Bank!5e0!3m2!1sen!2slk!4v1550746607145" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <p>If you did not find the answer to your question or problem, please get in touch with us using the form below and we will respond to your message as soon as possible.</p>
                            <form id="contact-form" class="contact-form" novalidate="true">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Your Name" class="form-control" name="name" id="form-name" data-error="Name field is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" placeholder="Your E-mail" class="form-control" name="email" id="form-email" data-error="Email field is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Subject" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <button type="submit" class="cp-default-btn-sm disabled">Send Message</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12 col-12">
                                            <div class="form-response"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
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
                            {{--<li>--}}
                                {{--<a href="favourite-ad-list.html"><img src="{{asset('web/img/contact/more3.png')}}">Favorite Ad list</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                    <div class="sidebar-item-box">
                        {{--<img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">--}}
                        <img src="{{asset('web/img/contact/online_shopping_concept_male_and_various_goods_illustration_6826369.jpg')}}"alt="banner" class="img-fluid m-auto" id="shoppinImg">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection