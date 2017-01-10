@extends('MainLayout')
@section('banner')
    <div class="card block" style="height: 200px;background-color: orange">

        <div class="container" style="margin-top: 3%">

            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 1</b></h2>
            </div>

            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 1</b></h2>
            </div>
            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 1</b></h2>
            </div>
            <div style="text-align: center;" class="card col-md-3">
                <h2><b>section 1</b></h2>
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
                    <a href="post">
                        <button class="btn btn-block">Create Your Question</button>
                    </a>
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
                    <li class="list-group-item" style="background-color:transparent;text-align: left;"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspJava
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspLaravel
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspphp
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspSpring
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspSql
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspAngular
                    </li>
                    <li class="list-group-item" style="background-color:transparent;text-align: left"><span
                                class="glyphicon glyphicon-globe" style="color: deepskyblue"></span>&nbsp&nbspCss
                    </li>
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
                            <h4><b>{{$hd->post_title}} &nbsp&nbsp</b><span class="label label-danger"
                                                                           style="background-color: red"><a
                                            href="specificpost/{{$hd->category}}">{{$hd->category}}</a></span>
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
@endsection
