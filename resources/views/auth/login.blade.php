@extends('auth.layouts.base')

@section('content')
    <form id="loginForm" novalidate class="fs_split_flex_wrapper" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="fs_split_body" style="margin-top: 50px;">
            <h1>EasyCost</h1>

            <p class="ghost_white" style="text-align: center">
                @if (count($errors) > 0)
                    Wrong credentials!
                @endif
            </p>
            <div class="input_wrapper email form-group">
                <p class="input_overlay"></p>
                <input required
                       autofocus
                       name="email"
                       type="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       placeholder="Email">
            </div>
            <div class="input_wrapper form-group">
                <p class="input_overlay"></p>
                <input required
                       type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password">
            </div>
            <label>
                <a class="ghost_white" href="{{ url('/password/reset') }}">
                    <span class="normal">Forgot your </span>password<span class="normal">?</span>
                </a>
            </label>
        </div>

        <div class="fs_split_footer submits">
            <div class="button_container">
                <button type="submit" id="submit_btn" class="btn btn_large">
                    <span>Login</span>
                </button>
            </div>
        </div>
    </form>
@endsection