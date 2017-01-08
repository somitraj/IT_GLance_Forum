@extends('MainLayout')
@section('banner')
    <div class="banner" style="height: 200px;margin-top: 10px">
    </div>
    <div class="row" style="margin-top: -80px">
        <div class="col-md-3">
            @foreach($profiledata as $p)
                <img src="/images/som.jpg" class="img-responsive" width="120" height="120 "
                     style="display: block;margin: 0 auto;"><br><br>
                <h4 style="color: deepskyblue;text-align: center">  {{$p->fname}} {{$p->mname}} {{$p->lname}}</h4><br>
                <h6 style="margin-left: 90px"> Status :<b
                            style="color: white;background-color: orange">{{$p->user_type}}</b></h6><br>
                <h6 style="margin-left: 90px">Studied {{$p->course_name}} at {{$p->college}}</h6>
            @endforeach
        </div>

        <div class="col-md-9" style="right:10px">
            <div class="card">
                <div class="card-block">
                    {{--<div>
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
                                <a class="nav-link" data-toggle="tab" href="usersetting" role="tab"> Settings<span
                                            class="badge"></span></a>
                            </li>

                        </ul>
                    </div>--}}
                    @yield('profilenav')


                    <div class="container-fluid" style="color: black;margin-top: 50px">

                        @yield('userinfosection')


                    </div>


                </div>
            </div>

        </div>
    </div>

    </div>
@endsection