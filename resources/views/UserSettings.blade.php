@extends('UserProfileLayout')
@section('profilenav')
    <div class="nav nav-tabs tabs-4" id="profiledetailtab">
        <li><a href="profile" role="navigation" class="nav navbar-default ">Profile<span
                        class="badge"></span></a></li>
        <li><a href="useractivities" role="navigation" class="nav navbar-default ">Activities<span
                        class="badge"></span></a></li>
        <li><a href="userprojects" role="navigation" class="nav navbar-default ">Projects<span
                        class="badge"></span></a></li>
        <li class="active"><a href="usersettings" role="navigation" class="nav navbar-default ">Settings<span
                        class="badge"></span></a></li>
    </div>
@endsection
@section('userinfosection')
    <h4 style="color: deepskyblue"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;About </h4>
@endsection