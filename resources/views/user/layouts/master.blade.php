<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AdminLTE 3 | @yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- bootstrap 4 --}}
    <link rel="stylesheet"
        href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('blog/css/master.css') }}"> --}}

    {{-- icon --}}
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    {{-- bootstrap 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{-- RichTextEditor --}}
    <link rel="stylesheet" href="{{ asset('lib/richtexteditor/rte_theme_default.css') }} " />
    <script type="text/javascript" src="{{ asset('lib/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/richtexteditor/plugins/all_plugins.js') }}"></script>

    {{-- Capcha Gooogle --}}
    <script src='https://www.google.com/recaptcha/api.js'></script>

    {{-- pusher --}}
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <style>

    </style>

    @stack('styles-dashboard')
    @stack('styles-page')

</head>

<body class="hold-transition layout-top-nav">

    {{-- toastr --}}
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}


    @yield('content')
    @stack('scripts-dashboard')
    @stack('scripts-page')

</body>

</html>
