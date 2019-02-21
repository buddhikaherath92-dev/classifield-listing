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
<div class="col-10">

    <div class="container" style="margin-top: 150px ; text-align: center;margin-left: 10%">
        <br>
        <div class="well">
            <h2 class="text-divider"><span >What is AluthAdslk?</span></h2>
            <p>
                AluthAdslk is one of the largest online marketing hub which advertise Electronics , Fashion ,   Events,  Animals ,Jobs, Property and more....... It is a place for everyone, for the people who seek advertise to the marketing team looking for the platform to advertise anything. This website is uniquely designed for the advertise of Sri Lanka.
            </p>
            <p>
                Consumers can easily browse and view all their advances by categories. They also have access to view the details of the Advertiser under the profile section where who has published the advertisements, events and, jobs.

            </p>
            <br>
            <h3>How does it work?</h3>
            <p>If you are a seeker of advertising: we have different portals for the companies listed under different categories showing their advertisements,  Item, Service and job vacancies.</p>
            <p>If you want to advertise your things: first you have to register with us as a corporate user or Individual user
                then you acquire to post your advertisement.</p>

            <br>
            <h3>Target audience?</h3>
            <p>This is a unique website for everyone who loves shopping. Whether you love shopping  it is the place for it. If you are willing to provide & get services in education, hospital or others, we have separate sections for jobs & education.</p>

            <br>
            <h3>Vision</h3>
                <p>To become the worlds’ preferred and the finest free classified platform. We continuously innovate to be the best destination for our customers and partners.</p>
        </div>

    </div>
</div>
@endsection