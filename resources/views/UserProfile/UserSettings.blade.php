@extends('UserProfile.UserProfileLayout')
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
    <div class="row">
        <div class="col-md-3">
            <br>
            <b><h6>Personal</h6></b>
        </div>

        <div class="col-md-8 border-left">
            <h4 style="margin-left: 20px;color: grey">Basic Information</h4><br>
            <div style="margin-left: 40px">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                                 class="close"
                                                                                                 data-dismiss="alert"
                                                                                                 aria-label="close">&times;</a>
                        </p>
                    @endif
                @endforeach
            </div>
            {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection