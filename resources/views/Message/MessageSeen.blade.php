@extends('MainLayout')

@section('contents')
    <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-block margin-bottom">Compose</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">{{count($msgdata)}}</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li  class="active"><a href="#"><i class="fa fa-archive"></i> Seen</a></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>

                    {{--  <div class="box-tools pull-right">
                          <div class="has-feedback">
                              <input type="text" class="form-control input-sm" placeholder="Search Mail">
                              <span class="glyphicon glyphicon-search form-control-feedback"></span>
                          </div>
                      </div>--}}
                            <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    {{-- <div class="mailbox-controls">
                         <!-- Check all button -->
                         <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                         </button>
                         <div class="btn-group">
                             <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                             <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                             <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                         </div>
                         <!-- /.btn-group -->
                         <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                         <div class="pull-right">
                             1-50/200
                             <div class="btn-group">
                                 <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                 <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                             </div>
                             <!-- /.btn-group -->
                         </div>
                         <!-- /.pull-right -->
                     </div>--}}
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped" id="tablesearch">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Sender</th>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($msgdata as $md)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                    <td class="mailbox-name">
                                        <a href="memberprofile/{{$md->sender_userid}}">{{$md->username}}</a>
                                    </td>
                                    <td class="mailbox-subject"><b>{{$md->subject}}</b>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date"><?php
                                        $now = $nowdate . " " . $nowtime;
                                        $postdate = $md->created_at;
                                        $dteStart = new DateTime($postdate);
                                        $dteEnd = new DateTime($now);
                                        $dteDiff = $dteStart->diff($dteEnd);
                                        if ($dteDiff->format("%D") > 0) {
                                            echo $dteDiff->format("%D days ago");
                                        } elseif ($dteDiff->format("%D") == 0 && $dteDiff->format("%H") > 0) {
                                            echo $dteDiff->format("%H hours ago");
                                        } else {
                                            echo $dteDiff->format("%I minutes ago");
                                        }
                                        ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="messageview/{{$md->id}}">
                                                <button class="">view</button>
                                            </a>
                                            <button type="button" class=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="fa fa-square-o"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('script')
    <script src="/js/jquery.slimscroll.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tablesearch').DataTable({
                "pagingType": "simple_numbers"
            });
        });
    </script>

@endsection