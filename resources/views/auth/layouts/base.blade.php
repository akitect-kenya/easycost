<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">\
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">

    <title>EasyCost</title>
</head>
<body class="fullbleed">
    <div class="no_header full_bleed full_height no_margin">
        <div class="full_height fs_split">
            <!-- Authentication Form -->
            <div class="logo_area">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
            </div>

            <div class="fs_split_pane fs_split_pane_left">
                @yield('content')
            </div>
        </div>
    </div>
    <!--  jQuery 1.7+  -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        $("#loginForm").validate();
    </script>
</body>
</html>