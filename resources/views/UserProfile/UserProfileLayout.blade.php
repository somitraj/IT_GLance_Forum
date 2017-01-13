@extends('MainLayout')
@section('banner')
    <div class="banner" style="height: 200px;">
    </div>
    <div class="row" style="margin-top: -80px">
        <div class="col-md-3">
            @foreach($profiledata as $p)
                <div class="proimg">
                    <img src="/profile_pic/{{$p->profile_image}}" class="img-responsive"
                         style="display: block;margin: 0 auto;">
                    <div class="overlay"></div>
                    <div class="changebutton"><a data-toggle="modal" data-target="#mymodal"> Change </a></div>

                </div>
                {{-- <img src="/images/som.jpg" class="img-responsive" width="120" height="120 "
                      style="display: block;margin: 0 auto;">--}}<br><br>
                <h4 style="color: deepskyblue;text-align: center">  {{$p->fname}} {{$p->mname}} {{$p->lname}}</h4><br>
                <h6 style="margin-left: 90px"> Status :<b
                            style="color: white;background-color: orange">{{$p->user_type}}</b></h6><br>
                <h6 style="margin-left: 90px">Studied {{$p->course_name}} at {{$p->college}}</h6>
            @endforeach
        </div>

        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>
                    </div>
                    <!--Body-->

                    <form action="imageupload" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="file" name="proimage" accept='.jpeg,.png,.jpg' required>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Save changes">Save Changes</button>

                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
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