@extends('UserProfile.MemberProfileLayout')
@section('profilenav')
    <div class="nav nav-tabs tabs-1" id="profiledetailtab">
        <li class="active"><a href="#" role="navigation" class="nav navbar-default ">Profile<span
                        class="badge"></span></a></li>

    </div>
@endsection
@section('userinfosection')
    <div class="row" id="messagestatus">
        <div class="col-md-6">
            <h4 style="color: deepskyblue"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Personal Information </h4>
        </div>
        <div class="col-md-6">
            <a data-toggle="modal" data-target="#sendmessage">
                <button style="color: white;background-color: darkorange;float: right"> Send Message
                </button>
            </a>
        </div>

        {{--start of modal--}}
        <div class="modal  messagebox" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="false">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Send Message</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">


                            <textarea placeholder="Type Your Message Here" class="form-control field-input" id="message"></textarea>
                            <input type="hidden" value="{{$destid}}" id="destId">

                    </div>
                    <div class="modal-footer">

                        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                        <button onclick="SendMessage();" data-dismiss="modal"
                                class="btn btn-primary " id="send">
                            Send
                        </button>

                    </div>


                </div>
                <!--/.Content-->
            </div>
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
@section('script')

    <script>

        function SendMessage() {

            var msg=$('#message').val();
            var destId=$('#destId').val();
            var userId = '<?php echo Auth::user()->id;?>';
            //window.alert(msg);
            $.post("/api/sendmessage", {msg: msg,destId: destId,userId: userId}, function (data) {
                    })
                    .done(function () {

                        $('#messagestatus').append('<p>' + '<h6 class="alert-success">' + 'Message Sent !!!' + '</h6>' + '</p>');


                    });


        }

    </script>
    @endsection