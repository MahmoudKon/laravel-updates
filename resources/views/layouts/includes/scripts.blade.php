<!-- Libs JS -->
<script type="text/javascript" src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
<!-- Tabler Core -->
<script type="text/javascript" src="{{ asset('assets/js/tabler.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

@vite(['resources/js/app.js'])

@yield('js')
@stack('js')
