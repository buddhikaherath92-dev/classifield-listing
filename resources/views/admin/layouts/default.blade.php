@extends('admin.layouts.main')

@section('content')

    @include('admin.templates.header')

    <div id="wrapper">

        @include('admin.templates.side_bar')

        <div id="content-wrapper">

            <div class="container-fluid">

                @include('admin.templates.breadcrumb')

                @yield('child-content')


            </div>

            @include('admin.templates.footer')

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.templates.logout_model')

@endsection