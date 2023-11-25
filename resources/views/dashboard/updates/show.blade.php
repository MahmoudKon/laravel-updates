@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title"> @lang('updates.show-details') </h3>
        </div>

        {!! $row->about !!}
        <hr>
        <a href="{{ $row->getUpdateLink() }}" class="btn btn-sm btn-primary"> @lang('updates.file') </a>
    </div>
@endsection
