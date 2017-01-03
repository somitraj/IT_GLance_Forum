@extends('MainLayout')
@section('contents')
    <div class="row">
    <div class="col-md-4 col-md-offset-3">


        <img src="images/IT-Glance-logo.png" class="img-responsive " style="width: 300px;height: 70px;margin-left: 80px">
        <div class="card" style="margin-top: 70px;width: 500px"><br><br>
            <img src="images/som.jpg" id="logo" width="120" height="120 " style="margin-left: 200px">

            <div class="card-block" style="margin-top: 50px">


                {{--<img src="images/IT-Glance-logo.png" class="img-circle">
--}}
                {!! form_start($form) !!}
                <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    {!! form_widget($form->username) !!}
                    {!! form_label($form->username) !!}
                    {!! form_errors($form->username) !!}
                </div>
                <!--Body-->
                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    {!! form_widget($form->password) !!}
                    {!! form_label($form->password) !!}
                    {!! form_errors($form->password) !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                <div class="md-form">
                    {!! form_widget($form->rememberme) !!}
                    {!! form_label($form->rememberme) !!}
                    {!! form_errors($form->rememberme) !!}
                </div>
                    </div>
                    <div class="col-md-6">
                        <a href="#">Forgot Password?</a>
                        </div>
                </div>
                {!! form_end($form) !!}


            </div>

        </div>
    </div>
</div>
@endsection