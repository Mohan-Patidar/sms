<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>G.B.Convent School</title>


    <link href="{{url('/')}}/assets/css/global.css" rel="stylesheet">



    <!-- Theme Styles -->
    <!--<link href="{{url('/')}}/assets/css/space.css" rel="stylesheet">-->
</head>

<body>
    @yield('content')

     <script src="{{url('/')}}/assets/js/jquery-3.5.1.min.js"></script>
       <script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/js/validate.js"></script>
   
    @yield('additionalscripts')