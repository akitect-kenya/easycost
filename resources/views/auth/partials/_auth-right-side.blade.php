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
        <div id="signup_graphics" class="fs_split_graphics owl-carousel">
            <div class="item"><img src="https://www.unilever-ewa.com/Images/rexona_tcm1283-408784.gif" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/omo_tcm1283-408778_w198.png" alt="The Last of us"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/vaseline_tcm1283-408800_w198.png" alt="GTA V"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/fair-lovely_tcm1283-408989_1_w198.png" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/blueband_tcm1283-408743_w198.png" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/knorr_tcm1283-408767_w198.png" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/lifebuoy_tcm1283-408770_w198.jpg" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/royco_tcm1283-408785.gif" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/sunlight_tcm1283-409039_w198.png" alt="Mirror Edge"></div>
            <div class="item"><img src="https://www.unilever-ewa.com/Images/geisha_tcm1283-408864_w198.png" alt="Mirror Edge"></div>
        </div>
    </div>
    <div class="fs_split_footer"></div>
</div>