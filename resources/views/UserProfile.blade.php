<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/20/2016
 * Time: 6:56 PM
 */
?>
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<title>IT Glance Forum</title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> {{-- imp to make responsive--}}
    <title>{{ trans('front/site.title') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> {{--imp to make responsive--}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">


    @yield('head')

</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-dark warning-color-dark ">

    <div class="container-fluid">
        @include('navs')
    </div>
</nav>
<!--/.Navbar-->

<div class="container">
    <h1>Welcome</h1>

</div>
</body>
</html>
