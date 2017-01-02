@extends('MainLayout')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <span class="glyphicon glyphicon-backward"></span> <a href="javascript:history.back()">Go
                        Back</a>
                </li>
            </ol>
        </div>
    </div>
    <h3><i class="fa fa-info-circle"></i> Details</h3>
    <div class="table-responsive">
        @foreach($details as $userdetail)
            <div class="table-responsive">
                <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                       width="100%">
                    <tr>
                        <th class="col-md-2">First Name</th>
                        <td class="col-md-2"> {{$userdetail->fname}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Last Name</th>
                        <td class="col-md-2"> {{$userdetail->lname}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">DOB</th>
                        <td class="col-md-2"> {{$userdetail->dob}}</td>
                    </tr>
                    {{--<tr>
                        <th class="col-md-2">Email</th>
                        <td class="col-md-2"> {{$userdetail->email}}</td>
                    </tr>--}}
                    <tr>
                        <th class="col-md-2">Phone no</th>
                        <td class="col-md-2"> {{$userdetail->phone_no}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">Mobile no</th>
                        <td class="col-md-2"> {{$userdetail->mobile_no}}</td>
                    </tr>
                    <tr>
                        <th class="col-md-2">College</th>
                        <td class="col-md-2"> {{$userdetail->college}}</td>
                    </tr>
                </table>
            </div>
        @endforeach
    </div>
@endsection