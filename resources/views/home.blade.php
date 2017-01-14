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
                    <li class="b list-group-item" style="background-color:transparent;text-align: left;"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspAll
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspPopular
                        All Time
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspPopular
                        This Week
                    </li>
                    <li class="b list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspMy
                        Question
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
            @foreach($homedata as $hd)
                <div class="card">
                    <div class="row">
                        <div class="col-md-2" style="margin-left: 10px;">
                            <img src="/profile_pic/{{$hd->profile_image}}" id="logo"
                                 style="width:80px;height:80px;margin-top: 15px;">
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
                                echo $dteDiff->format("%D days, %H hours %I minutes ago");
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
                    <form name="myForm">
                        <input type="text" value="" name="Test Name" id="box4" style="display:none">
                        <i class="fa fa-comment" onclick="addTextBox()"></i>
                    </form>
                </div>

            @endforeach
        </div>

    </div>


@endsection
@section('script')
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
    <script>
        function addTextBox() {
            var box4 = document.getElementById("box4");
            box4.style.display = "inline";
            var myForm = document.forms['myForm'];
            for (var i = 0; i < myForm.elements.length; i++) {
                box4.value += myForm.elements[i].value + ",";
            }
        }
    </script>

@endsection
