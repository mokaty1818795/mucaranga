<li class="sidebar-item @if (request()->routeIs('dashboard')) active @endif">
    <a class="sidebar-link " href="{{ route('dashboard') }}">
        @svg('radix-dashboard', 'feather align-middle')<span class="align-middle">Dashboard</span>
    </a>
</li>

@if (request()->routeIs('payment_invoices'))
    <li class="sidebar-item active">
        <a class="sidebar-link " href="">
            @svg('phosphor-printer', 'feather align-middle')
            <span class="align-middle">Invoice</span>
        </a>
    </li>
@endif

<li class="sidebar-item @if (request()->routeIs('finances*')) active @endif">
    <a class="sidebar-link " href="{{ route('finances') }}">
        @svg('phosphor-chart-line-up-fill', 'feather align-middle')<span class="align-middle">Reports</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('registration.create')) active @endif">
    <a class="sidebar-link " href="{{ route('registration.create') }}">
        <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Enroll</span>
    </a>
</li>

@if (request()->routeIs('registration.edit'))
    <li class="sidebar-item active">
        <a class="sidebar-link " href="{{ route('registration.edit', $registration->id) }}">
            <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">
                Update Enrollment
            </span>
        </a>
    </li>
@endif

<li class="sidebar-item @if (request()->routeIs('student.*')) active @endif">
    <a class="sidebar-link " href="{{ route('student.index') }}">
        @svg('phosphor-student-duotone', 'feather align-middle') <span class="align-middle">Students</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('profile')) active @endif">
    <a class="sidebar-link " href="{{ route('profile') }}">
        <i class="align-middle" data-feather="user"></i>
        <span class="align-middle">Profile</span>
    </a>
</li>
