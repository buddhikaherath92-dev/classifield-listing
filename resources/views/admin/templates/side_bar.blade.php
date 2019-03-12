<ul class="sidebar navbar-nav">
    <li class="nav-item @if(Route::currentRouteName() === 'admin_dashboard') active @endif">
        <a class="nav-link" href="{{route('admin_dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item @if(Route::currentRouteName() === 'admin_advertisements') active @endif">
        <a class="nav-link" href="{{route('admin_advertisements')}}">
            <i class="fas fa-fw fa-audio-description"></i>
            <span>Advertisements</span>
        </a>
    </li>
    <li class="nav-item @if(Route::currentRouteName() === 'admin_newsletters') active @endif">
        <a class="nav-link" href="{{route('admin_newsletters')}}">
            <i class="far fa-address-card"></i>
            <span>News Letters</span>
        </a>
    </li>
    <li class="nav-item @if(Route::currentRouteName() === 'view_referals') active @endif">
        <a class="nav-link" href="{{route('view_referals')}}">
            <i class="fas fa-sync-alt"></i>
            <span>Referrals</span>
        </a>
    </li>
</ul>