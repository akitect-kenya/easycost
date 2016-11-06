@extends('auth.layouts.base')

@section('content')
    <form class="fs_split_flex_wrapper" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="fs_split_body" style="margin-top: 150px;">
            <h1>Welcome to EasyCost</h1>
            <p class="ghost_white">
                (Help you get the right price)
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