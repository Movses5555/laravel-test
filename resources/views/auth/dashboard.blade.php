
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{ Request::is('company') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/company') }}">Companies</a>
                </li>
                <li class="nav-item {{ Request::is('employee') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/employee') }}">Employees</a>
                </li>
            </ul>

        </div>
    </nav>
</div>
