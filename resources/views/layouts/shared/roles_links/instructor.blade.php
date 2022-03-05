<li class="sidebar-item @if (request()->routeIs('dashboard')) active @endif">
    <a class="sidebar-link " href="{{ route('dashboard') }}">
        @svg('radix-dashboard' ,'feather align-middle')<span class="align-middle">Turmas</span>
    </a>
</li>
<li class="sidebar-item @if (request()->routeIs('student.*')) active @endif">
    <a class="sidebar-link " href="{{ route('student.index') }}">
        @svg('phosphor-student-duotone' ,'feather align-middle') <span
            class="align-middle">Todos estudantes</span>
    </a>
</li>
<li class="sidebar-item  @if (request()->routeIs('profile')) active @endif">
    <a class="sidebar-link " href="{{ route('profile') }}">
        <i class="align-middle" data-feather="user"></i>
        <span class="align-middle">Perfil</span>
    </a>
</li>
