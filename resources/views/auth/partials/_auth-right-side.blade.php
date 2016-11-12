<div id="signup_graphics_wrapper" class="fs_split_flex_wrapper">
    <div class="fs_split_header">
        @if(!isset($hideLogin) || !(isset($hideLogin) && $hideLogin))
            <div id="login" class="">
                {{--<span>Already have an account? </span>--}}
                <a id="login_link" href="{{ url('/login') }}" data-qa="find_team_button">Login</a>
                <p></p>
            </div>
        @endif
    </div>
    <div id="signup_graphics_container" class="fs_split_body">
        <!--<h2 class="centered">Let us help you share all your files</h2>-->
        <div id="signup_graphics" class="fs_split_graphics"></div>
    </div>
    <div class="fs_split_footer"></div>
</div>