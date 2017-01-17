@extends('UserProfile.MemberProfileLayout')
@section('profilenav')
    <div class="nav nav-tabs tabs-1" id="profiledetailtab">
        <li class="active"><a href="#" role="navigation" class="nav navbar-default ">Profile<span
                        class="badge"></span></a></li>

    </div>
@endsection
@section('userinfosection')
    <div class="row">
        <div class="col-md-6">
            <h4 style="color: deepskyblue"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Personal Information </h4>
        </div>

    </div>
    <br>
    <div class="row">
        @foreach($profiledata as $pd)
            <div class="col-md-3">
                <b>Name</b><br>
                <b>Username</b><br>
                <b>Email</b><br>
                <b>Birthday</b><br>
            </div>
            <div class="col-md-3">
                <h6>{{$pd->fname}}</h6>
                <h6>{{$pd->username}}</h6>
                <h6>{{$pd->email}}</h6>
                <h6>{{$pd->dob}}</h6>
            </div>
            <div class="col-md-3">
                <b>Work</b><br>
                <b>Website</b><br>
                <b>City</b><br>
                <b>Country</b><br>
            </div>
            <div class="col-md-3">
                <h6>Php Developer</h6>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h4 style="color: deepskyblue"><i class="fa fa-trophy"></i>&nbsp;&nbsp;&nbsp;Experiences </h4>
            <br>

        </div>
        <div class="col-md-6">
            <h4 style="color: deepskyblue"><i class="fa fa-mortar-board"></i>&nbsp;&nbsp;&nbsp;Education </h4>
            <br>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h4 style="color: deepskyblue"><i class="fa fa-cubes"></i>&nbsp;&nbsp;&nbsp;Skills </h4>
            <br>


        </div>


    </div>



@endsection