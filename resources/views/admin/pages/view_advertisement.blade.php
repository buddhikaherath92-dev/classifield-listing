@extends('admin.layouts.default')

<style>
    #single-ad-main-wrapper{
        padding: 10px;
    }
    .single-ad-box{
        padding: 2px;
        overflow-x: hidden;
        border: #23272b solid 1px;
        border-radius: 5px;
        margin: 5px;
        background-color: silver;
    }
    #single-ad-title{
        background-color: #9d9d9d;
    }
    #single-ad-desc{
        background-color: #00FFFF;
    }
    #single-ad-cat{
        background-color: yellow;
    }
    #single-ad-keywords{
        background-color: green;
    }
    #single-ad-loc{
        background-color: blue;
    }
    #single-ad-price{
        background-color: red;
        color: white;
    }
    .carousel-inner img {
        width: 100%;
        height: 70%;
        display: block;
        margin: auto;
    }
</style>

@section('child-content')
    <div class="card mb-3" id="single-ad-main-wrapper">
        <div class="row">
            <div class="col-6">
                <div id="single-ad-title" class="single-ad-box">
                    <h6>{{$data->title}}</h6>
                </div>
                <div id="single-ad-desc" class="single-ad-box">
                    <p>{!! $data['summary-ckeditor'] !!}</p>
                </div>
                <div id="single-ad-cat" class="single-ad-box">
                    <h6>{{config('constance.categories')[$data->category_id]['name']}} ->
                        {{config('constance.categories')[$data->category_id]['sub_cat'][$data->subcategory_id]['name']}}</h6>
                </div>
                <div id="single-ad-keywords" class="single-ad-box">
                    <h6>{{$data->key_words}}</h6>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div id="single-ad-loc" class="single-ad-box">
                            <h6>{{$data->district}}</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="single-ad-price" class="single-ad-box">
                            @if($data->is_negotiable === 1)
                                <h6>Negotiable</h6>
                            @else
                                <h6 class="text-center">{{$data->price.' LKR'}}</h6>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="single-ad-box text-center">
                    @if( $data->is_inactive == 1 )
                        <form action="{{ route('admin_advertisements_update') }}" method="POST">
                            @csrf
                            <input id="variation" name="is_inactive" type="hidden" value="0">
                            <input name="id" id="adId" type="hidden" value="{{$data->id}}">
                            <button class="btn btn-success" type="submit">Approve</button>
                        </form>
                    @endif
                        @if( $data->is_inactive == 0 )
                            <form action="{{ route('admin_advertisements_update') }}" method="POST">
                                @csrf
                                <input id="variation" name="is_inactive" type="hidden" value="1">
                                <input name="id" id="adId" type="hidden" value="{{$data->id}}">
                                <button class="btn btn-warning" type="submit">Reject</button>
                            </form>
                        @endif
                </div>
            </div>
            <div class="col-6">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner" style="background-color: #23272b">
                        @if($data->img_1 !==null)
                        <div class="carousel-item active">
                            <img src="{{env('APP_URL').'images/advertisements/'.$data->img_1}}" alt="Los Angeles">
                        </div>
                        @endif
                        @if($data->img_2 !==null)
                        <div class="carousel-item">
                            <img src="{{env('APP_URL').'images/advertisements/'.$data->img_2}}" alt="Chicago">
                        </div>
                        @endif
                        @if($data->img_3 !==null)
                        <div class="carousel-item">
                            <img src="{{env('APP_URL').'images/advertisements/'.$data->img_3}}" alt="New York">
                        </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection