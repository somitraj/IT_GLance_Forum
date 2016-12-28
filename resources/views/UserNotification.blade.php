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
    <div class="card" style="min-height: 400px">
        <h2>UserRequests<span class="badge">{{count($notice)}}</span></h2>
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
                    <th>Email</th>
                    <th></th>
                    <th>Select Role</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($notice as $no)
                    <tr>
                        <td>{{$no->email}}</td>
                        <td><a href="userdetails\{{$no->id}}" class="btn btn-success  btn">View</a></td>

                        <td><select>
                                <option>Select Role</option>
                                @foreach($usertype as $ut)
                                <option>{{$ut->user_type}}</option>
                                @endforeach
                            </select></td>

                        <td><a href="userapprove\{{$no->id}}" class="btn btn-primary  btn">Approve</a></td>
                        <td><a href="deleteuser\{{$no->id}}" class="btn btn-danger  btn">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
</div>
</body>
</html>
