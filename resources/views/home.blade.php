@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Auth::user()->hasRole('administrator'))
            <workspace :admin="true"></workspace>
        @else
            <workspace :admin="false"></workspace>
        @endif
    </div>
@endsection
