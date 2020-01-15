

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @if(Auth::check())
                        <li class="nav-item {{ Request::is('companies') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/companies') }}">Companies</a>
                        </li>
                        <li class="nav-item {{ Request::is('employees') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/employees') }}">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"> logout </a>
                        </li>
                    @else
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

