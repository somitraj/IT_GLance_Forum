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
    <link href="/css/mdb.css" rel="stylesheet">
    <link href="/css/mdb.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    {{--<link href="/css/bootstrap-material-datepicker.css" rel="stylesheet">--}}
    <link href="/css/compiled.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">


    @yield('head')


</head>
<body style="background-color: ghostwhite">
<!--Navbar-->

<div style="">
    @include('navs')
</div>

    <div class="container">


        <div class="page-header">

            <h3>This is the page Where We can create Events</h3>

        </div>

        <div class="col-md-4">

            <a data-toggle="modal" data-target="#myevent">
                <button class="btn btn-block btn-outline-primary">Post An Event</button>
            </a>

            {{--start of modal--}}
            <div class="modal fade" id="myevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Create An Event</h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            {!! form_start($form) !!}
                            {{ csrf_field() }}
                            {!! form_rows($form,['event_title',
                                 'start',
                                 'end',
                                 'location',
                                 'event_image',
                                 'description',
                                 ]) !!}
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="submit" name="submit" value="createevent"
                                    class="btn btn-primary">
                                Create
                            </button>

                        </div>
                        {!! form_end($form,false) !!}

                    </div>
                    <!--/.Content-->
                </div>
            </div>

        </div>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/mdb.min.js"></script>
        <script src="/jquery/jqueryv311.min.js"></script>
        <script src="/js//moment.min.js"></script>
        <script src="/js/material.min.js"></script>
        <script src="/js/tether.min.js"></script>
        <script src="/js/compiled.min.js"></script>
        <script src="/js//fullcalendar.min.js"></script>
        <script src="/js/moment-with-locales.min.js"></script>
        <link href="/css/fullcalendar.min.css" rel="stylesheet">


        <div class="col-md-8">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
</body>
</html>


