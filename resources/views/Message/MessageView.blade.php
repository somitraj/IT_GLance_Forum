@extends('MainLayout')

@section('contents')
    {{--<div class="container-fluid">
        <div class="row">
            <div class="col-md-2">

                <div class="row">
                    <ul class="list-group">
                        <li class="b list-group-item"
                            style="background-color:transparent;text-align: left;"><a
                                    href="#">
                                <button class="btn btn-danger">COMPOSE</button>
                            </a></li>
                        <li class="b list-group-item" style="background-color:transparent;text-align: left"><a href="#"><span
                                    style="">&nbsp&nbspInbox</span></a>

                        </li>
                        <li class="b list-group-item" style="background-color:transparent;text-align: left"><a href="#"><span
                                   style="">&nbsp&nbspSent</span></a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>--}}

    <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block margin-bottom">Compose</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">12</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li><a href="#"><i class="fa fa-archive"></i> Seen</a></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @foreach($msgfulldata as $mfd)
            <div class="row">
                    Username : <input type="text" value="{{$mfd->username}}" disabled><br>
                    Subject : @if($mfd->subject=="")
                        <input type="text" value="null" disabled>
                    @else
                        <input type="text" id="msg-title" value="{{$mfd->subject}}" disabled>
                    @endif


                <br>
                Message: <textarea style="height:250px" disabled>{{$mfd->message}}</textarea>
            </div>
            <br><br>
            <div id="messagestatus"></div>
            <div class="row">
                <textarea placeholder="reply here" style="background-color: white;height: 150px;" id="message"></textarea>
                <input type="hidden" value="{{$mfd->sender_userid}}" id="destId">
                <button onclick="SendMessage()">send</button>
            </div>
            @endforeach
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('script')

    <script>

        function SendMessage() {
            var msg = $('#message').val();
            var destId = $('#destId').val();
            var userId = '<?php echo Auth::user()->id;?>';
            var msgtitle = $('#msg-title').val();
            //window.alert(msg);
            $.post("/api/sendmessage", {msg: msg, destId: destId, userId: userId, msgtitle: msgtitle}, function (data) {
                    })
                    .done(function () {

                        $('#messagestatus').append('<p>' + '<h6 class="alert-success">' + 'Message Sent !!!' + '</h6>' + '</p>');


                    });


        }

    </script>
@endsection
