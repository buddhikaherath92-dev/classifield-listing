<ol class="breadcrumb">

    @if(Route::currentRouteName() === 'admin_dashboard')
        <li class="breadcrumb-item">
            <a href="{{route('admin_dashboard')}}">Dashboard</a>
        </li>
    @endif
        @if(Route::currentRouteName() === 'admin_advertisements')
            <li class="breadcrumb-item">
                <a href="{{route('admin_advertisements')}}">Advertisements</a>
            </li>
        @endif
    @if(Route::current()->uri === 'admin/view_advertisement')
            <li class="breadcrumb-item">
                <a href="#">View Advertisement</a>
            </li>
        @endif

        @if(Route::current()->uri === 'admin/banner_ads')
            <li class="breadcrumb-item">
                <a href="#">Banner Ads</a>
            </li>
        @endif

</ol>
