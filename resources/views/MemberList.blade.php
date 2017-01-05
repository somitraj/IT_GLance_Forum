@extends('MainLayout')

@section('contents')
    <div class="card" style="min-height: 400px">
        @foreach($member as $a)
        @if($a->user_type_id==1)
                <h2>Admin List<span class="badge"></span></h2>
                <div class="nav nav-tabs">
                    <li><a href="memberlist" role="navigation" class="nav navbar-default ">All<span
                                    class="badge"></span></a></li>
                    <li class="active"><a href="adminlist" role="navigation" class="nav navbar-default ">Admin<span
                                    class="badge">{{count($member)}}</span></a></li>
                    <li><a href="mentorlist" role="navigation" class="nav navbar-default ">Mentor<span
                                    class="badge"></span></a></li>
                    <li><a href="submentorlist" role="navigation" class="nav navbar-default ">Submentor<span
                                    class="badge"></span></a></li>
                    <li ><a href="internlist" role="navigation" class="nav navbar-default ">Intern<span
                                    class="badge"></span></a></li>
                </div>
                @elseif($a->user_type_id==2)
                    <h2>Mentor List<span class="badge"></span></h2>
                    <div class="nav nav-tabs">
                        <li><a href="memberlist" role="navigation" class="nav navbar-default ">All<span
                                        class="badge"></span></a></li>
                        <li><a href="adminlist" role="navigation" class="nav navbar-default ">Admin<span
                                        class="badge"></span></a></li>
                        <li class="active"><a href="mentorlist" role="navigation" class="nav navbar-default ">Mentor<span
                                        class="badge">{{count($member)}}</span></a></li>
                        <li><a href="submentorlist" role="navigation" class="nav navbar-default ">Submentor<span
                                        class="badge"></span></a></li>
                        <li ><a href="internlist" role="navigation" class="nav navbar-default ">Intern<span
                                        class="badge"></span></a></li>
                    </div>
            @elseif($a->user_type_id==3)
                <h2>Submentor List<span class="badge"></span></h2>
                <div class="nav nav-tabs">
                    <li><a href="memberlist" role="navigation" class="nav navbar-default ">All<span
                                    class="badge"></span></a></li>
                    <li><a href="adminlist" role="navigation" class="nav navbar-default ">Admin<span
                                    class="badge"></span></a></li>
                    <li><a href="mentorlist" role="navigation" class="nav navbar-default ">Mentor<span
                                    class="badge"></span></a></li>
                    <li class="active"><a href="submentorlist" role="navigation" class="nav navbar-default ">Submentor<span
                                    class="badge">{{count($member)}}</span></a></li>
                    <li ><a href="internlist" role="navigation" class="nav navbar-default ">Intern<span
                                    class="badge"></span></a></li>
                </div>
            @else
        <h2>Intern List<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li><a href="memberlist" role="navigation" class="nav navbar-default ">All<span
                            class="badge"></span></a></li>
            <li><a href="adminlist" role="navigation" class="nav navbar-default ">Admin<span
                            class="badge"></span></a></li>
            <li><a href="mentorlist" role="navigation" class="nav navbar-default ">Mentor<span
                            class="badge"></span></a></li>
            <li><a href="submentorlist" role="navigation" class="nav navbar-default ">Submentor<span
                            class="badge"></span></a></li>
            <li class="active"><a href="internlist" role="navigation" class="nav navbar-default ">Intern<span
                            class="badge">{{count($member)}}</span></a></li>
        </div>
            @endif
        @endforeach
        <table class="table table-bordered">
            <table id="example" class="display table table-responsive table-striped" cellspacing="0" width="100%"
                   style="margin-left: 50px;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($member as $i)
                    <tr>
                        <td>{{$i->fname}}</td>
                        <td>{{$i->email}}</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
@endsection
