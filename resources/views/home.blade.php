@extends('MainLayout')
@section('banner')
    <div class="card block" style="height: 200px;background-color: orange">
        <br>
        <h5 style="float: right;color: black;background-color: yellow"> welcome, {{Auth::user()->username}}</h5>
        <div class="container" style="margin-top: 3%">

            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 1</b></h2>
            </div>

            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 2</b></h2>
            </div>
            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 3</b></h2>
            </div>
            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 4</b></h2>
            </div>
            <div>
                {!! Form::open(['method'=>'GET','url'=>'search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

                <div class="input-group custom-search-form md-form">
                    <input type="text" id="form9" class="form-control" name="search" required style="width: 350px;">
                    <label for="form1" class="">Search Here</label>
                    <span class="input-group-btn">
        <button class="btn-btn-unique" type="submit" style="font-size: 16px"><i
                    class="fa fa-search "></i> Search
        </button>

    </span>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('contents')
    <br>
    <div class="row">

        <div style="text-align: center" class="col-md-4">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @foreach($usertype as $ut)
                        <a href="/{{$ut->user_type}}/post">
                            <button class="btn btn-block btn-outline-primary">Create Your Question</button>
                        </a>
                    @endforeach
                </div>
            </div>
            <br>
            <h3><b>Choose Filtering Option</b></h3>
            <br>
            <div class="col-md-9 col-md-offset-2">
                <ul class="list-group">
                    <li class="b list-group-item"
                        style="background-color:transparent;text-align: left;">@foreach($usertype as $ut)<a
                                href="/{{$ut->user_type}}/home">
                            <span class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspAll
                        </a>@endforeach</li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspPopular
                        All Time
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspPopular
                        This Week
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><a
                                href="myquestions"> <span
                                    class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspMy
                            Question</a>
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspAnswered
                        Question
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspUnanswered
                        Question
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspLast
                        Question
                    </li>
                </ul>
                <br>
            </div>
            <h3><b>Choose Category</b></h3>
            <br>
            <div class="col-md-9 col-md-offset-2 category">
                <ul class="list-group">
                    @foreach($category as $cat)
                        @foreach($usertype as $u)
                            <a href="/{{$u->user_type}}/specificpost/{{$cat->category}}">
                                <li class="list-group-item" style="background-color:transparent;text-align: left;"><span
                                            class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbsp {{$cat->category}}
                                </li>
                            </a>
                        @endforeach
                    @endforeach

                </ul>
            </div>

        </div>
        <div class="col-md-8" style="margin-bottom: 10px;">
            @foreach($homedata as $key=> $hd)
                <div class="card">
                    <div class="row">
                        <div class="col-md-2" style="margin-left: 10px;">
                            @if(Auth::user()->id==$hd->user_id)
                                <a href="profile">
                                    <img src="/profile_pic/{{$hd->profile_image}}"
                                         id="logo"
                                         style="width:80px;height:80px;margin-top: 15px;" class="img-responsive">
                                </a>
                            @else
                                <a href="memberprofile/{{$hd->user_id}}">
                                    <img src="/profile_pic/{{$hd->profile_image}}"
                                         id="logo"
                                         style="width:80px;height:80px;margin-top: 15px;" class="img-responsive">
                                </a>
                            @endif
                            {{--<img src="/profile_pic/{{$hd->profile_image}}" id="logo"
                                 style="width:80px;height:80px;margin-top: 15px;">--}}
                        </div>
                        <div class="col-md-9" style="margin-left: -10px;">
                            <h4><b>{{$hd->post_title}} &nbsp&nbsp</b>
                                <span class="label label-danger" id="categorybackground">
                                    @foreach($usertype as $u)
                                        <a style="color: white;" onMouseOver="this.style.color='#0F0'"
                                           onMouseOut="this.style.color='white'"
                                           href="/{{$u->user_type}}/specificpost/{{$hd->category}}">{{$hd->category}}</a>
                                    @endforeach
                                </span>
                            </h4>
                            <p><?php
                                $now = $nowdate . " " . $nowtime;
                                $postdate = $hd->created_at;
                                $dteStart = new DateTime($postdate);
                                $dteEnd = new DateTime($now);
                                $dteDiff = $dteStart->diff($dteEnd);
                                if ($dteDiff->format("%D") > 0) {
                                    echo $dteDiff->format("%D days ago");
                                } elseif ($dteDiff->format("%D") == 0 && $dteDiff->format("%H") > 0) {
                                    echo $dteDiff->format("%H hours ago");
                                } else {
                                    echo $dteDiff->format("%I minutes ago");
                                }
                                //echo $dteDiff->format("%D days, %H hours %I minutes ago");
                                ?> | Posted By : <b
                                        style="background-color: deepskyblue;color: white">{{$hd->username}}</b></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 " style="margin-bottom: 10px;margin-top: -20px;">
                            <p><b class="comment more"><?php echo($hd->post_body) ?>
                                </b></p>

                        </div>
                    </div>

                    <hr>

                    <div>


                        <div class="row">
                            @foreach($comment as $cc)
                                @if($hd->id==$cc->post_id)
                                    <div class="col-md-2" style="padding-left: 10%">
                                        @if(Auth::user()->id==$cc->user_id)
                                            <a href="profile"><img
                                                        src="/profile_pic/{{$cc->profile_image}}"
                                                        style="width:40px;height:40px;" class="img-responsive"></a>
                                        @else
                                            <a href="memberprofile/{{$cc->user_id}}"><img
                                                        src="/profile_pic/{{$cc->profile_image}}"
                                                        style="width:40px;height:40px;" class="img-responsive"></a>
                                        @endif
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 10px;margin-top: -20px;">
                                        <div class="row" style="">
                                            <p><h6>
                                                -{{$cc->comment}}</h6></p>
                                        </div>
                                        <div class="row"><p style="font-size: 12px;color: grey">
                                                at {{$cc->updated_at}}</p>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                            <div id="comment-{{$hd->id}}" style="margin-left:16.5%"></div>
                        </div>
                        <div id="<?php echo $hd->id; ?>"></div>

                        <i class="fa fa-comment" onclick="addTextBox('<?php echo $hd->id; ?>')"></i>
                        {{-- <input type="hidden" id="userid" value="{{Auth::user()->id}}">--}}
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection
@section('script')
    <script>
        function addTextBox(boxId) {
            //  $('#'+boxId).clear();
            $('.comment-box').remove();
            $('.combutton').remove();
            $('#' + boxId).append('<input type="text" id="comment" placeholder="write a comment" name="comment" class="comment-box"/>' +
                    '<input type="hidden" id="box_id" value="boxId" class="comment-box"/ >' +
                    '<input type="hidden" id="postid" value="' + boxId + '" class="comment-box">' +
                    '<button onclick="postComment1();" id="combutton" class="comment-box">Ok</button> ');
            /*document.getElementById('myForm').submit();*/
        }
    </script>1

    <script>
        function postComment1() {
            var box = $('#postid').val();
            //window.alert(box);
            var com = $('#comment').val();
            var userId = '<?php echo Auth::user()->id;?>';
            $.post("/api/postcomment", {userId: userId, comment: com, postId: box}, function (data) {
                        // $( ".result" ).html( data );
                    })
                    .done(function () {
                        //window.alert('success');
                        // $('#'+boxId).clear();
                        //$('#combutton').clear();
                        // alert(box);
                        $('.comment-box').remove();
                        $('#comment-' + box).append('<p>' + '<h6>' + '-' + com + '</h6>' + '</p>');
                        // $('.comment-box').hide();
                        // $('.combutton').hide();
                    });
        }
        /* function postcomment(userId,postId) {
         /!*window.alert(userId);
         window.alert(postId);*!/
         var com= $('#comment').val();
         var us=userId;
         var pd=postId;
         $.ajax({
         url: 'api/postcomment',
         type: 'POST',
         //dataType: 'json',
         data:JSON.stringify(com,us,pd),
         contentType:"application/json",
         success: function (data, textStatus, xhr) {
         alert('test');
         },
         error: function (xhr, textStatus, errorThrown) {
         alert('fail');
         }
         })}*/
    </script>
    <SCRIPT>
        $(document).ready(function () {
            var showChar = 150;
            var ellipsestext = "...";
            var moretext = "more";
            var lesstext = "less";
            $('.more').each(function () {
                var content = $(this).html();
                if (content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar - 1, content.length - showChar);
                    var html = c + '<span class="moreelipses">' + ellipsestext + '</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                    $(this).html(html);
                }
            });
            $(".morelink").click(function () {
                if ($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </SCRIPT>


@endsection