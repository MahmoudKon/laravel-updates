@extends('layouts.app')

@section('content')
    <div class="card">
        @include('dashboard.includes.card-header')

        @include('dashboard.includes.filter')

        <div class="table-responsive">
            @include('dashboard.'.getModule().'.table')
        </div>
    </div>
@endsection
