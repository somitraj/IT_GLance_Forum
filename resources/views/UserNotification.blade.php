@extends('MainLayout')

@section('contents')

    <div class="card" style="min-height: 400px">
        <h2>Notification<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li class="active"><a href="" role="navigation" class="nav navbar-default ">Member Request<span
                            class="badge">{{count($notice)}}</span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Feedbacks<span
                            class="badge"></span></a></li>
            <li><a href="postnotice" role="navigation" class="nav navbar-default ">Posts<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Jobs<span
                            class="badge"></span></a></li>
            <li><a href="eventnotice" role="navigation" class="nav navbar-default ">Events<span
                            class="badge"></span></a></li>
        </div>

        <table class="table table-bordered">
            <table id="example" class="display table table-responsive table-striped" cellspacing="0" width="100%"
                   style="margin-left: 50px;">
                <thead>
                <tr>
                    <th>Email</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($notice as $no)
                    <tr>
                        <td>{{$no->email}}</td>
                        <td><a href="userdetails\{{$no->id}}" class="btn btn-success  btn">View</a></td>
                        <td><a href="userapprove\{{$no->id}}" class="btn btn-primary  btn">Approve</a></td>
                        <td><a href="deleteuser\{{$no->id}}" class="btn btn-danger  btn">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
@endsection
