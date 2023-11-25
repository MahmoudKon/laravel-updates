<div class="collapse navbar-collapse" id="navbar-menu">
    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
        <ul class="navbar-nav">
            <li class="nav-item {{ checkRoute('home', 'active') }}">
                <a class="nav-link" href="{{ routeHelper('home') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-house"></i> </span>
                    <span class="nav-link-title"> Home </span>
                </a>
            </li>

            <li class="nav-item {{ checkRoute('users.*', 'active') }}">
                <a class="nav-link" href="{{ routeHelper('users.index') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users"></i> </span>
                    <span class="nav-link-title"> @lang('menu.users') </span>
                </a>
            </li>

            <li class="nav-item {{ checkRoute('updates.*', 'active') }}">
                <a class="nav-link" href="{{ routeHelper('updates.index') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users"></i> </span>
                    <span class="nav-link-title"> @lang('menu.updates') </span>
                </a>
            </li>
        </ul>
    </div>
</div>
