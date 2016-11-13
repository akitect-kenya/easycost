<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">

    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('owl/owl-carousel/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('owl/owl-carousel/owl.theme.css') }}">

    <title>EasyCost</title>
</head>
<body class="fullbleed">
    <div class="no_header full_bleed full_height no_margin">
        <div class="full_height fs_split">

            <!-- Authentication Form -->
            <div class="fs_split_pane fs_split_pane_left">
                @yield('content')
            </div>
            <!-- End of the Authentication Form -->

            <!-- Auth right side -->
            <div id="signup_graphics_pane" class="fs_split_pane fs_split_pane_right" data-step="signin">
                @include('auth.partials._auth-right-side')
            </div>
            <!-- End of the Auth right side -->
        </div>
    </div>
    <!--  jQuery 1.7+  -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Include js plugin -->
    <script src="{{ asset('owl/owl-carousel/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#signup_graphics").owlCarousel({
                navigation : false,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true
            });
        });
    </script>
</body>
</html>