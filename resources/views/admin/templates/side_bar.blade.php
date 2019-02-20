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
</ul>