@extends('MainLayout')
@section('sign')
    <div class="row">
        <div class="col-md-6">
           <a href="/" ><h6 class="fa fa-arrow-left">Go to home</h6></a>
        </div>
        <div class="col-md-6">
          <a href="/loginform"> <h6 class="fa fa-arrow-right" style="float: right">Go to Login Page</h6></a>
        </div>
    </div>
    @endsection
@section('contents')
    <div class="container-fluid" style="background-color: white">
    <div class="jumbotron" style="background-color: #667ff5">
        <h2 style="text-align: center"><b>Application Form</b></h2></div>
    {!! form($form) !!}
    </div>

@endsection