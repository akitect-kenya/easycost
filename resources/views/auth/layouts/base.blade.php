<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <title>Login</title>
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
</body>
</html>