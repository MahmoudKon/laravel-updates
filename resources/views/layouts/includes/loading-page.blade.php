<div id="loading-page" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: #fff; z-index: 1031; display: flex; justify-content: center; align-items: center;">
    <div class="text-center">
        <div class="mb-3">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo-small.svg" height="36" alt=""></a>
        </div>
        <div class="text-muted mb-3">Preparing application</div>
        <div class="progress progress-sm">
            <div class="progress-bar progress-bar-indeterminate"></div>
        </div>
    </div>
</div>

@push('js')
    <script defer>
        $(function () {
            $('#loading-page').fadeOut(500, function() {
                $(this).remove();
            });

            $('body').on('submit', 'form', function() {
                $(this).closest('.card').addClass('load');
            });
        });
    </script>
@endpush
