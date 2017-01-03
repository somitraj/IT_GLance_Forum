@extends('MainLayout')
@section('contents')
    <div class="container-fluid" style="background-color: white">
    <div class="jumbotron" style="background-color: #667ff5">
        <h2 style="text-align: center"><b>Application Form</b></h2></div>
    {!! form($form) !!}
    </div>

@endsection