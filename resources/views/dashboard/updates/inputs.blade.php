<div class="card-body">
    @csrf

    <div class="row">
        <div class="col-md-5">
            <div class="form-group mb-3">
                <label class="form-label">@lang('updates.link')</label>
                <div class="input-icon">
                    <input type="url" value="{{ $row->link ?? '' }}" name="link" class="form-control" placeholder="@lang('updates.link')">
                    <span class="input-icon-addon"> <i class="fas fa-link"></i> </span>
                </div>
                @include('layouts.includes.validation-error', ['input' => 'link'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label">@lang('updates.file')</label>
                <div class="input-icon">
                    <input type="file" name="file" class="form-control" placeholder="@lang('updates.file')" accept="zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed">
                    <span class="input-icon-addon"> <i class="fas fa-file-zipper"></i> </span>
                </div>
                @include('layouts.includes.validation-error', ['input' => 'file'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('updates.path')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->path ?? '' }}" name="path" class="form-control" placeholder="@lang('updates.path')">
                    <span class="input-icon-addon"> <i class="fas fa-file"></i> </span>
                </div>
                @include('layouts.includes.validation-error', ['input' => 'path'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('updates.version')</label>
                <div class="input-icon">
                    <input type="text" value="{{ $row->version ?? $next_version }}" name="version" class="form-control" placeholder="@lang('updates.version')">
                    <span class="input-icon-addon"> <i class="fas fa-file"></i> </span>
                </div>
                @include('layouts.includes.validation-error', ['input' => 'version'])
            </div>

            <div class="form-group mb-3">
                <label class="form-label required">@lang('updates.type')</label>
                <select name="type" class="form-select">
                    <option value="1" @selected( isset($row) && $row->type == 1 || !isset($row) )>  @lang('updates.feature') </option>
                    <option value="0" @selected( isset($row) && $row->type == 0 )>  @lang('updates.issue') </option>
                </select>
                @include('layouts.includes.validation-error', ['input' => 'type'])
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group mb-3">
                <label class="form-label required">@lang('updates.about')</label>
                <textarea name="about" class="form-control" id="tinymce-default" placeholder="@lang('updates.about')" rows="6">{{ $row->about ?? '' }}</textarea>
                @include('layouts.includes.validation-error', ['input' => 'about'])
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save mx-2"></i> </button>
</div>

@if (request()->ajax())
        <script type="text/javascript" src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
        <script>
            $(function() {
                let options = {
                    selector: '#tinymce-default',
                    height: 300,
                    menubar: false,
                    statusbar: false,
                }
                if (localStorage.getItem("tablerTheme") === 'dark') {
                    options.skin = 'oxide-dark';
                    options.content_css = 'dark';
                }
                tinyMCE.init(options);
            })
        </script>
@else
    @pushOnce('js')
        <script type="text/javascript" src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
        <script>
            $(function() {
                let options = {
                    selector: '#tinymce-default',
                    height: 300,
                    menubar: false,
                    statusbar: false,
                }
                if (localStorage.getItem("tablerTheme") === 'dark') {
                    options.skin = 'oxide-dark';
                    options.content_css = 'dark';
                }
                tinyMCE.init(options);
            })
        </script>
    @endPushOnce
@endif
