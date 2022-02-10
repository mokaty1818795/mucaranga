<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">{{config('app.name','laravel')}}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            @if(request()->routeIs('profile'))

            <li class="sidebar-item  active">
                <a class="sidebar-link " href="{{route('profile')}}">
                <i class="align-middle" data-feather="user"></i>
                <span class="align-middle">Perfil</span>
                </a>
            </li>

            @endif
            <li class="sidebar-item @if(request()->routeIs('dashboard')) active @endif">
                <a class="sidebar-link " href="{{route('dashboard')}}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('registration.create')) active @endif">
                <a class="sidebar-link " href="{{route('registration.create')}}">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Matricular</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('user.*')) active @endif">
                <a class="sidebar-link " href="{{route('user.index')}}">
                    <i class="far fa-users align-middle" data-feather="users"></i>
                <span class="align-middle">Usuários</span>
                </a>
            </li>
            <li class="sidebar-header">
                Configurações
            </li>
            <li class="sidebar-item @if(request()->routeIs('veicle_class.*')) active @endif">
                <a class="sidebar-link " href="{{route('veicle_class.index')}}">
                    <i class="far fa-car-side align-middle" data-feather="layers"></i>
                <span class="align-middle">Tipo de carta</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('period.*')) active @endif">
                <a class="sidebar-link " href="{{route('period.index')}}">
                <i class="fas fa-clock " data-feather="clock"></i>
                <span class="align-middle">Horário de aulas</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('civil_state.*')) active @endif">
                <a class="sidebar-link " href="{{route('civil_state.index')}}">
                <i class="align-middle" data-feather="loader"></i>
                <span class="align-middle">Estados civis</span>
                </a>
            </li>
            <li class="sidebar-item @if(request()->routeIs('payment_phase.*')) active @endif">
                <a class="sidebar-link " href="{{route('payment_phase.index')}}">
                <i class="align-middle" data-feather="dollar-sign"></i>
                <span class="align-middle">Fâses de pagamento</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
