@extends('MainLayout')
@section('banner')
    <div class="banner" style="height: 200px;margin-top: 10px">
    </div>
    <div class="row" style="margin-top: -80px">
        <div class="col-md-3">
            <img src="/images/som.jpg"  width="120" height="120 " style="margin-left: 130px;">
        </div>
        <div class="col-md-9" style="right:10px">
            <div class="card">
                <div class="card-block">
                    <div>
                    <ul class="nav nav-tabs tabs-4" id="profiledetailtab" role="tablist" style="">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"> Profile<span
                                        class="badge"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"> Activities<span
                                        class="badge"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel3" role="tab"> Projects<span
                                        class="badge"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel4" role="tab"> Settings<span
                                        class="badge"></span></a>
                        </li>

                    </ul>
                    </div>
                    <div class="container-fluid" style="color: black;margin-top: 50px">
                       <h4  style="color: deepskyblue"> <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Personal Information </h4>
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
                                <h6>Somit</h6>
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
                                <h4  style="color: deepskyblue"> <i class="fa fa-trophy"></i>&nbsp;&nbsp;&nbsp;Experiences </h4>
                                <br>

                            </div>
                            <div class="col-md-6">
                                <h4  style="color: deepskyblue"> <i class="fa fa-mortar-board"></i>&nbsp;&nbsp;&nbsp;Education </h4>
                                <br>
                            </div>
                        </div>

                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div>


@endsection
@section('contents')


@endsection
