<div class="card-body">
    @csrf

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.name')</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control" placeholder="@lang('users.name')" autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.validation-error', ['input' => 'name'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.email')</label>
        <div class="input-icon">
            <input type="email" value="{{ $row->email ?? '' }}" name="email" class="form-control" placeholder="@lang('users.email')">
            <span class="input-icon-addon"> <i class="fas fa-envelope"></i> </span>
        </div>
        @include('layouts.includes.validation-error', ['input' => 'email'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">@lang('users.password')</label>
        <div class="input-icon">
            <input type="password" value="" name="password" class="form-control" placeholder="@lang('users.password')">
            <span class="input-icon-addon"> <i class="fas fa-lock"></i> </span>
        </div>
        @include('layouts.includes.validation-error', ['input' => 'password'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> @lang('buttons.save') <i class="fas fa-save mx-2"></i> </button>
</div>
