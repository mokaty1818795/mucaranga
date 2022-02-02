<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">{{config('app.name','laravel')}}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            <li class="sidebar-item @if(request()->routeIs('dashboard')) active @endif">
                <a class="sidebar-link " href="{{route('dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('user.*')) active @endif">
                <a class="sidebar-link " href="{{route('user.index')}}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Usuários</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
