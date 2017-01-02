@extends('MainLayout')

@section('contents')
    <div class="card" style="min-height: 400px">
        <h2>All Members<span class="badge"></span></h2>
        <div class="nav nav-tabs">
            <li class="active"><a href="" role="navigation" class="nav navbar-default ">All<span
                            class="badge">{{count($all)}}</span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Admin<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Mentor<span
                            class="badge"></span></a></li>
            <li><a href="#" role="navigation" class="nav navbar-default ">Submentor<span
                            class="badge"></span></a></li>
            <li><a href="internlist" role="navigation" class="nav navbar-default ">Intern<span
                            class="badge"></span></a></li>
        </div>
        {{--<div class="nav nav-tabs">
            <li class="active"><a href="" role="navigation" class="nav navbar-default ">Venuelist<span
                            class="badge">{{count($managerlist)}}</span></a></li>
            <li><a href="venuedeactive" role="navigation" class="nav navbar-default ">Deleted venue<span
                            class="badge"></span></a></li>
        </div>--}}
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
                @foreach($all as $a)
                    <tr>
                        <td>{{$a->fname}}</td>
                        <td>{{$a->email}}</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </table>
    </div>
@endsection
