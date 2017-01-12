@extends('MainLayout')

@section('contents')
    <div class="container" style="margin-top: 40px;background-color: white">
        <div class="row">
            <div style="text-align: center" class="col-md-4">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        {{--<a href="postevent">
                            <button class="btn btn-block btn-outline-primary">Post An Event</button>
                        </a>--}}
                        <a data-toggle="modal" data-target="#myevent">
                            <button class="btn btn-block btn-outline-primary">Post An Event</button>
                        </a>

                        {{--start of modal--}}
                        <div class="modal fade" id="myevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Create An Event</h4>
                                    </div>
                                    <!--Body-->
                                    <div class="modal-body">
                                        {!! form_start($form) !!}
                                        {{ csrf_field() }}
                                        {!! form_rows($form,['event_title',
                                             'start',
                                             'end',
                                             'location',
                                             'event_image',
                                             'description',
                                             ]) !!}
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" name="submit" value="createevent"
                                                class="btn btn-primary">
                                            Create
                                        </button>

                                    </div>
                                    {!! form_end($form,false) !!}

                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        {{--End of modal--}}
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="margin-bottom: 10px;">
                {{-- <div class="jumbotron" style="background-color: #667ff5;color: white"><h3 style="text-align: center"><b>Post
                             An
                             Event</b></h3></div>--}}
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
                {{--{!! form($form) !!}--}}

                @foreach($postedevent as $hd)
                <div class="card">
                    <div class="row">
                        <div class="col-md-2" style="margin-left: 10px;">
                            <img src="/eventimage/{{$hd->event_image}}" id="logo"
                                 style="width:80px;height:80px;margin-top: 15px;">
                        </div>
                        <div class="col-md-9" style="margin-left: -10px;">
                            <h4><b>{{$hd->event_title}} &nbsp&nbsp</b></h4>
                            <p> Posted By : <b
                                        style="background-color: deepskyblue;color: white">{{$hd->username}}</b></p>
                            <h5>Start Date :<b>{{$hd->start_datetime}}</b></h5>
                            <h5>End Date :<b>{{$hd->end_datetime}}</b></h5>
                            <h5>Location :<b>{{$hd->event_location}}</b></h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 " style="margin-bottom: 10px;margin-top: -20px;">
                            <p><b><?php echo($hd->event_description) ?>
                                </b></p>
                        </div>
                    </div>

                   {{-- <table class="table table-bordered">
                        <div class="row">
                            <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                                   width="100%"
                                   style="margin-left: 50px;">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                @foreach($postedevent as $hd)
                                    <tbody>
                                    <tr>
                                        <td>{{$hd->start_datetime}}</td>
                                        <td>{{$hd->event_title}}</td>
                                        <td>{{$hd->event_location}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </table>--}}


                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

