<!DOCTYPE html>
<html>
<head>

    <title>PROJECT TRASH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- favicons -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ mix('front/css/style.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/custom-responsive-style.css') }}"> --}}
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script type="text/javascript" src="{{ mix('front/js/app.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('front/js/all-plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/plugin-active.js') }}"></script> --}}
</head>
<body data-spy="scroll" data-target=".main-navigation" data-offset="150">
    @yield('content')
</body>
</html>
