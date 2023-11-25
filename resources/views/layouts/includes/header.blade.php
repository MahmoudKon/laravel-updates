<header class="navbar navbar-expand-md navbar-overlap d-print-none" style="border-bottom: 1px solid;">
    <div class="container-xl">
        {{-- DROPDOWN TO [CHANGE LANG & THEME & LOGOUT] --}}
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link nav-options d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset('assets/img/avatars/069m.jpg') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ auth()->user()->email }}</div>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @if (app()->isLocale('ar'))
                        <a href="{{ routeHelper('change.lang', 'en') }}" class="nav-link px-0" title="English" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            EN
                        </a>
                    @else
                        <a href="{{ routeHelper('change.lang', 'ar') }}" class="nav-link px-0" title="Arabic" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            AR
                        </a>
                    @endif

                    <div class="dropdown-divider"></div>

                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>

                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="4" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>

                    <div class="dropdown-divider"></div>

                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">@lang('buttons.logout')</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- LINKS SECTION --}}
        @include('layouts.includes.sidebar')
    </div>
</header>
