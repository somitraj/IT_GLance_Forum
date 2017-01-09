@extends('MainLayout')

@section('contents')
    <div class="card" style="min-height: 400px">

        <ul class="nav nav-tabs tabs-5 indigo" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel1" role="tab"> All<span
                            class="badge">{{count($all)}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"> Admin<span
                            class="badge">{{count($member1)}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel3" role="tab"> Mentor<span
                            class="badge">{{count($member2)}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel4" role="tab"> Submentor<span
                            class="badge">{{count($member3)}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel5" role="tab"> Intern<span
                            class="badge">{{count($member4)}}</span></a>
            </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">

            <!--Panel 1-->

            <div class="tab-pane fade in" id="panel1" role="tabpanel">
                <br>
                <table class="table table-bordered">
                    <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                           width="100%"
                           style="margin-left: 50px;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $i)
                            <tr>
                                <td>{{$i->fname}}</td>
                                <td>{{$i->email}}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </table>
            </div>

            <!--/.Panel 1-->

            <!--Panel 2-->
            @foreach($member1 as $m)
                @if($m->user_type_id==1)
                    <div class="tab-pane fade in" id="panel2" role="tabpanel">
                        <br>
                        <table class="table table-bordered">
                            <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                                   width="100%"
                                   style="margin-left: 50px;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member1 as $i)
                                    <tr>
                                        <td>{{$i->fname}}</td>
                                        <td>{{$i->email}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </table>
                    </div>
                    @endif
                    @endforeach
                            <!--/.Panel 2-->

                    <!--Panel 3-->
                    <div class="tab-pane fade in " id="panel3" role="tabpanel">
                        <br>
                        <table class="table table-bordered">
                            <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                                   width="100%"
                                   style="margin-left: 50px;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member2 as $i)
                                    <tr>
                                        <td>{{$i->fname}}</td>
                                        <td>{{$i->email}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </table>
                    </div>
                    <!--/.Panel 3-->

                    <!--Panel 4-->
                    <div class="tab-pane fade in" id="panel4" role="tabpanel">
                        <br>
                        <table class="table table-bordered">
                            <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                                   width="100%"
                                   style="margin-left: 50px;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member3 as $i)
                                    <tr>
                                        <td>{{$i->fname}}</td>
                                        <td>{{$i->email}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </table>
                    </div>
                    <!--/.Panel 4-->

                    <!--Panel 5-->
                    <div class="tab-pane fade in" id="panel5" role="tabpanel">
                        <br>
                        <table class="table table-bordered">
                            <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                                   width="100%"
                                   style="margin-left: 50px;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member4 as $i)
                                    <tr>
                                        <td>{{$i->fname}}</td>
                                        <td>{{$i->email}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </table>
                    </div>
                    <!--/.Panel 5-->

        </div>

    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $('#myTab a[href="#panel1"]').tab('show')
        })

    </script>
@endsection