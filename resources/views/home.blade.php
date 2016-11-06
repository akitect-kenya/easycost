@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Auth::user()->hasRole('administrator'))
            @include('admin.dashboard')
        @endif

        @if(\Auth::user()->hasRole('accountant'))
            @include('accountant.dashboard')
        @endif
    </div>
@endsection
