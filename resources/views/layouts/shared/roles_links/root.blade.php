<li class="sidebar-item @if (request()->routeIs('dashboard')) active @endif">
    <a class="sidebar-link " href="{{ route('dashboard') }}">
        @svg('fluentui-box-24', 'feather align-middle')<span class="align-middle">Dashboard</span>
    </a>
</li>

<li class="sidebar-item  @if (request()->routeIs('profile')) active @endif">
    <a class="sidebar-link " href="{{ route('profile') }}">
        <i class="align-middle" data-feather="user"></i>
        <span class="align-middle">Profile</span>
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

<li class="sidebar-header">
    Payment Settings
</li>

<li class="sidebar-item @if (request()->routeIs('veicle_class.*')) active @endif">
    <a class="sidebar-link " href="{{ route('veicle_class.index') }}">
        @svg('fluentui-contact-card-ribbon-16', 'feather align-middle')
        <span class="align-middle">Vehicle Class</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('exam_type.*')) active @endif">
    <a class="sidebar-link " href="{{ route('exam_type.index') }}">
        @svg('fluentui-text-bullet-list-square-edit-24-o', 'feather align-middle')
        <span class="align-middle">Exam Type</span>
    </a>
</li>

<li class="sidebar-header">
    Settings
</li>

<li class="sidebar-item @if (request()->routeIs('period.*')) active @endif">
    <a class="sidebar-link " href="{{ route('period.index') }}">
        <i class="fas fa-clock " data-feather="clock"></i>
        <span class="align-middle">Class Schedule</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('class_room.*')) active @endif">
    <a class="sidebar-link " href="{{ route('class_room.index') }}">
        @svg('phosphor-police-car-duotone', 'feather align-middle')
        <span class="align-middle">Classes</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('civil_state.*')) active @endif">
    <a class="sidebar-link " href="{{ route('civil_state.index') }}">
        @svg('css-ring', 'feather align-middle')
        <span class="align-middle">Civil States</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('payment_phase.*')) active @endif">
    <a class="sidebar-link " href="{{ route('payment_phase.index') }}">
        @svg('fluentui-payment-16-o', 'feather align-middle')
        <span class="align-middle">Payment Phases</span>
    </a>
</li>

<li class="sidebar-item @if (request()->routeIs('user.*')) active @endif">
    <a class="sidebar-link " href="{{ route('user.index') }}">
        <i class="far fa-users align-middle" data-feather="users"></i>
        <span class="align-middle">Users</span>
    </a>
</li>
