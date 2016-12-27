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
    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container-fluid">
        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand">&nbsp;</a>
            <!--Links-->
            @include('navs')
        </div>
        <!--/.Collapse content-->
    </div>
</nav>
<!--/.Navbar-->

<div class="container">
   <h1>Welcome</h1>

    @if(Auth::check())
        <a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
    @endif
</div>
</body>
</html>
