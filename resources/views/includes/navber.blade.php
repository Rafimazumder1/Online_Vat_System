<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">Mushak Khata</a>
    {{-- @php
    use Illuminate\Support\Facades\Auth;
@endphp

<li>
    <a class="dropdown-item" href="#!">
         {{(Auth::user()->APPS_USER) }}
            User not logged in

    </a>
</li> --}}
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->

    <div class="text-centert">
        <p class="company-name">{{ session('company_name') }}</p>
    </div>

    <style>
        .company-name {
            color: white;
            font-weight: bold;
        }
        /* Optionally, you can add this to center the text in the parent container */
        .text-centert {
            text-align: center;
            margin-top: 17px;
            margin-left: 286px;
        }
    </style>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">

            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="d-none d-md-inline-block navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                <p>{{ Auth::user()->apps_user }}!</p>
                <p>{{ Auth::user()->company_code }}</p>

            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <a class="dropdown-item" href="#!"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
