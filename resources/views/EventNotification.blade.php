@extends('MainLayout')

@section('contents')

    <div class="card" style="min-height: 400px">
        <h2>Notification<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li><a href="notification" role="navigation" class="nav navbar-default ">Member Request<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Feedbacks<span
                            class="badge"></span></a></li>
            <li><a href="postnotice" role="navigation" class="nav navbar-default ">Posts<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Jobs<span
                            class="badge"></span></a></li>
            <li class="active"><a href="#" role="navigation" class="nav navbar-default ">Events<span
                            class="badge">{{count($eventnotice)}}</span></a></li>
        </div>
        <table class="table table-bordered">
            <table id="example" class="display table table-responsive table-striped" cellspacing="0" width="100%"
                   style="margin-left: 50px;">
                <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Location</th>
                    <th>Title</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($eventnotice as $en)
                    <tr>
                        <td><img src="/eventimage/{{$en->event_image}}" height="50px" width="50px" class="eventimage"></td>
                        <td>{{$en->username}}</td>
                        <td>{{$en->event_location}}</td>
                        <td>{{$en->event_title}}</td>
                        <td><a href="eventdetails\{{$en->id}}" class="btn btn-success  btn">View</a></td>
                        <td><a href="eventapprove\{{$en->id}}" class="btn btn-primary  btn">Approve</a></td>
                        <td><a href="deleteevent\{{$en->id}}" class="btn btn-danger  btn">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
@endsection
