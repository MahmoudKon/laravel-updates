<table class="table card-table table-vcenter text-nowrap datatable">
    <thead>
        <tr>
            <th class="w-1">
                <label class="form-check form-check-single form-switch cursor-pointer p-0">
                    <input class="form-check-input cursor-pointer m-0 align-middle" id="check-all-rows" type="checkbox">
                </label>
            </th>
            <th class="w-1">#</th>
            <th>@lang('updates.date')</th>
            <th>@lang('updates.name')</th>
            <th>@lang('updates.type')</th>
            <th>@lang('updates.size')</th>
            <th>@lang('updates.extension')</th>
            <th>@lang('updates.path')</th>
            <th>@lang('updates.version')</th>
            <th>@lang('buttons.show')</th>
            {{-- <th>@lang('buttons.edit')</th> --}}
            <th>@lang('buttons.delete')</th>
        </tr>
    </thead>
    <tbody id="load-table"></tbody>
</table>
