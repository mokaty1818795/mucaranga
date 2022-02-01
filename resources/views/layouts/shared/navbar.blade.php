<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                @auth
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">

                            {{Auth::user()->name}}
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"  onclick="document.getElementById('logoutForm').submit()" >Log out</a>

                    <form  action="{{route('logout')}}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </div>
                @endauth
            </li>
        </ul>
    </div>
</nav>

