@extends('MainLayout')

@section('contents')

    <div class="card" style="min-height: 400px">
        <h2>Notification<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li ><a href="notification" role="navigation" class="nav navbar-default ">Member Request<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Feedbacks<span
                            class="badge"></span></a></li>
            <li class="active"><a href="#" role="navigation" class="nav navbar-default ">Posts<span
                            class="badge">{{count($postnotice)}}</span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Jobs<span
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
                    <th>Username</th>
                    <th>Category</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($postnotice as $po)
                    <tr>
                        <td>{{$po->username}}</td>
                        <td>{{$po->category}}</td>
                        <td><a href="postdetails\{{$po->id}}" class="btn btn-success  btn">View</a></td>
                        <td><a href="postapprove\{{$po->id}}" class="btn btn-primary  btn">Approve</a></td>
                        <td><a href="deletepost\{{$po->id}}" class="btn btn-danger  btn">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
@endsection
