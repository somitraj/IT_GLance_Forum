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
    <link href="/css/font-awesome.min.css" rel="stylesheet">


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
    <div class="card" style="min-height: 400px">
        <h2>Notification<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li class="active"><a href="" role="navigation" class="nav navbar-default ">All<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Admin<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Mentor<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Submentor<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Intern<span
                            class="badge"></span></a></li>
        </div>
        {{--<div class="nav nav-tabs">
            <li class="active"><a href="" role="navigation" class="nav navbar-default ">Venuelist<span
                            class="badge">{{count($managerlist)}}</span></a></li>
            <li><a href="venuedeactive" role="navigation" class="nav navbar-default ">Deleted venue<span
                            class="badge"></span></a></li>
        </div>--}}
        <table class="table table-bordered">
            <table id="example" class="display table table-responsive table-striped" cellspacing="0" width="100%"
                   style="margin-left: 50px;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $a)
                    <tr>
                        <td>{{$a->fname}}</td>
                        <td>{{$a->email}}</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
</div>
</body>
</html>
