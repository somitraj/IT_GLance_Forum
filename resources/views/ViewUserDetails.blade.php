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
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active">
                        <span class="glyphicon glyphicon-backward"></span> <a href="javascript:history.back()">Go
                            Back</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="form-header red">
            {{--<h3><i class="fa fa-info-circle"></i> Details</h3>--}}
        </div>
        <div class="container">
            <h3><i class="fa fa-info-circle"></i> Details</h3>
            <div class="table-responsive">
                @foreach($details as $userdetail)
                    <div class="table-responsive">
                        <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                               width="100%">
                            <tr>
                                <th class="col-md-2">First Name</th>
                                <td class="col-md-2"> {{$userdetail->fname}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">Last Name</th>
                                <td class="col-md-2"> {{$userdetail->lname}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">DOB</th>
                                <td class="col-md-2"> {{$userdetail->dob}}</td>
                            </tr>
                            {{--<tr>
                                <th class="col-md-2">Email</th>
                                <td class="col-md-2"> {{$userdetail->email}}</td>
                            </tr>--}}
                            <tr>
                                <th class="col-md-2">Phone no</th>
                                <td class="col-md-2"> {{$userdetail->phone_no}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">Mobile no</th>
                                <td class="col-md-2"> {{$userdetail->mobile_no}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">College</th>
                                <td class="col-md-2"> {{$userdetail->college}}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

</body>
</html>
