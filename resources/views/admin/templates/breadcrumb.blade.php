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

</ol>