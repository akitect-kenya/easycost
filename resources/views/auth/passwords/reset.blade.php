@extends('auth.layouts.base')

@section('content')
    <form class="fs_split_flex_wrapper" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="fs_split_mini_header mini align_center small_padding full_width bottom_border">
            <span>Do not have an account? </span>
            <a href="http://app.skoolspace.com/register" class="underline flat_grey">Create an account</a>
        </div>

        <div class="fs_split_body" style="margin-top: 150px;">
            <h1>Reset Password</h1>
            <p class="ghost_white">

            </p>
            <div class="input_wrapper email form-group">
                <p class="input_overlay"></p>
                <input required
                       autofocus
                       name="email"
                       type="email"
                       class="form-control"
                       value="{{ $email or old('email') }}"
                       placeholder="example@unliever.com">
            </div>
            <div class="input_wrapper form-group">
                <p class="input_overlay"></p>
                <input required
                       type="password"
                       name="password"
                       class="form-control"
                       placeholder="New password">
            </div>
            <div class="input_wrapper form-group">
                <p class="input_overlay"></p>
                <input required
                       type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Repeat password">
            </div>
            <label>
                <a class="ghost_white" href="{{ url('/login') }}">
                    <span class="normal">Back to </span>login<span class="normal">?</span>
                </a>
            </label>
        </div>

        <div class="fs_split_footer submits">
            <div class="button_container">
                <button type="submit" id="submit_btn" class="btn btn_large">
                    <span>Reset Password</span>
                </button>
            </div>
        </div>
    </form>
@endsection
