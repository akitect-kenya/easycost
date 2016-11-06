@extends('auth.layouts.base')

@section('content')
    <form class="fs_split_flex_wrapper" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="white fs_split_mini_header mini align_center small_padding full_width bottom_border">
            <span>Already have an account? </span>
            <a href="{{ url('/login') }}" class="underline flat_grey">Login</a>
        </div>

        <div class="fs_split_body" style="margin-top: 150px;">
            <h1>Reset Password</h1>
            <p class="ghost_white">
                (Get a link to create your new password)
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
        </div>

        <div class="fs_split_footer submits">
            <div class="button_container">
                <button type="submit" id="submit_btn" class="btn btn_large">
                    <span>Send Password Reset Link</span>
                </button>
            </div>
        </div>
    </form>
@endsection