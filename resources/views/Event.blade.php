@extends('MainLayout')

@section('contents')
  <div class="container" style="margin-top: 40px;background-color: white">
      <div class="jumbotron" style="background-color: #667ff5;color: white"><h3 style="text-align: center"><b>Post An Event</b></h3></div>
    {!! form($form) !!}
  </div>

@endsection
