@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page title -->
        <div class="row col-md-12 header">
            <select name="savoury" id="savoury" class="selector">
                <option value="">Savoury</option>
            </select>
            <select name="spreads" id="spreads" class="selector">
                <option value="">Spreads</option>
            </select>
            <select name="pcare" id="pcare" class="selector">
                <option value="">Personal Care</option>
            </select>
            <select name="pwash" id="pwash" class="selector">
                <option value="">Personal Wash</option>
            </select>
        </div>

        <!-- Workspace -->
        <div class="workspace">

            <!-- Workspace heading -->
            <div class="heading">
                <h3>Good: Geisha</h3>
            </div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a>
                </li>
                <li role="presentation">
                    <a href="#costing" aria-controls="profile" role="tab" data-toggle="tab">Costing</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                @include('partials._overview')
                @include('partials._costing')
            </div>

        </div>
    </div>
@endsection
