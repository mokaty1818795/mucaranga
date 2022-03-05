<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">{{ config('app.name', 'laravel') }}</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>
            @hasanyrole(['Default'])
                @include('layouts.shared.roles_links.default')
            @endhasanyrole

            @hasanyrole(['Intructor'])
                @include('layouts.shared.roles_links.intructor')
            @endhasanyrole
            @hasanyrole(['Employee'])
                @include('layouts.shared.roles_links.employee')
            @endhasanyrole
            @hasanyrole(['Director'])
                @include('layouts.shared.roles_links.director')
            @endhasanyrole

            @hasanyrole(['Root'])
                @include('layouts.shared.roles_links.root')
            @endhasanyrole
        </ul>
    </div>
</nav>
