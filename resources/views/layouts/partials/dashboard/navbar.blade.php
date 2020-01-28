<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fa fa-align-left"></i>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>  
                @else
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Profile') }}</a>
                </li>
                @can('manage-users')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{ __('Logout') }}">logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>