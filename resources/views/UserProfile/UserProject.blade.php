@extends('UserProfile.UserProfileLayout')
@section('profilenav')
    <div class="nav nav-tabs tabs-4" id="profiledetailtab">
        <li><a href="profile" role="navigation" class="nav navbar-default ">Profile<span
                        class="badge"></span></a></li>
        <li><a href="useractivities" role="navigation" class="nav navbar-default ">Activities<span
                        class="badge"></span></a></li>
        <li class="active"><a href="#" role="navigation" class="nav navbar-default ">Projects<span
                        class="badge"></span></a></li>
        <li><a href="usersettings" role="navigation" class="nav navbar-default ">Settings<span
                        class="badge"></span></a></li>
    </div>
@endsection
@section('userinfosection')
    <div class="row">
        <div class="col-md-6">
            <h4 style="color: deepskyblue"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Projects </h4>
        </div>
        <div class="col-md-6">
            <a href="#">
                <button style="color: white;background-color: darkorange;float: right"><i class="fa fa-plus"></i> Add
                    Projects
                </button>
            </a>
        </div>
    </div>
@endsection