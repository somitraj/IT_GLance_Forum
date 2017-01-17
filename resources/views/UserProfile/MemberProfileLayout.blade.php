@extends('MainLayout')
@section('banner')
    <div class="banner" style="height: 200px;">

            <div class="col-lg-12" >
                <ol class="breadcrumb" style="background-color: transparent">
                    <li class="active">
                        <span class="glyphicon glyphicon-backward"></span> <a href="javascript:history.back()" style="color: white">Go
                            Back</a>
                    </li>
                </ol>
            </div>
        </div>

    <div class="row" style="margin-top: -80px">
        <div class="col-md-3">
            @foreach($profiledata as $p)
                <div class="proimg">
                    <img src="/profile_pic/{{$p->profile_image}}" class="img-responsive"
                         style="display: block;margin: 0 auto;">


                </div>
                {{-- <img src="/images/som.jpg" class="img-responsive" width="120" height="120 "
                      style="display: block;margin: 0 auto;">--}}<br><br>
                <h4 style="color: deepskyblue;text-align: center">  {{$p->fname}} {{$p->mname}} {{$p->lname}}</h4><br>
                <h6 style="margin-left: 90px"> Status :<b
                            style="color: white;background-color: orange">{{$p->user_type}}</b></h6><br>
                <h6 style="margin-left: 90px">Studied {{$p->course_name}} at {{$p->college}}</h6>
            @endforeach
        </div>


        <div class="col-md-9" style="right:10px">
            <div class="card">
                <div class="card-block">

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