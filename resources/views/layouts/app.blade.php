<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

{{-- START HEAD SECTION --}}
@include('layouts.includes.head')
{{-- END HEAD SECTION --}}

<body class="layout-fluid">
    {{-- START SIDEBAR SECTION --}}
    @include('layouts.includes.loading-page')
    {{-- END SIDEBAR SECTION --}}

    <div class="page">

        <div class="page-wrapper">
            {{-- START HEADER SECTION --}}
            @include('layouts.includes.header')
            {{-- END HEADER SECTION --}}

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        {{-- START ALERT SECTION --}}
                        @include('layouts.includes.alerts')
                        {{-- END ALERT SECTION --}}

                        @yield('content')
                    </div>
                </div>
            </div>

            {{-- START FOOTER SECTION --}}
            @include('layouts.includes.footer')
            {{-- END FOOTER SECTION --}}
        </div>
    </div>

    {{-- START JAVASCRIPTS SECTION --}}
    @include('layouts.includes.scripts')
    {{-- END JAVASCRIPTS SECTION --}}


    {{-- START MODALS SECTION --}}
    @include('layouts.includes.modals')
    {{-- END MODALS SECTION --}}

</body>

</html>
