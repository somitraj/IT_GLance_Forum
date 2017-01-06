@extends('MainLayout')

@section('contents')
    <div class="container" style="margin-top: 40px;background-color: white">
        <div class="jumbotron" style="background-color: #667ff5;color: white"><h3 style="text-align: center"><b>Post An
                    Event</b></h3></div>
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                             class="close"
                                                                                             data-dismiss="alert"
                                                                                             aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
        {!! form($form) !!}
    </div>


@endsection

