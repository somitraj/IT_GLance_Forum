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
        @foreach($details as $postdetail)
            <div class="table-responsive">
                <table id="example" class="display table table-responsive table-striped" cellspacing="0"
                       width="100%">
                    <tr>
                        <th class="col-md-2">Title</th>
                        <td>{{$postdetail->post_title}}</td>

                    </tr>
                    <tr>
                        <th class="col-md-2">Body</th>
                        <td><?php echo $postdetail->post_body?></td>

                    </tr>

                </table>
            </div>
        @endforeach
    </div>
@endsection