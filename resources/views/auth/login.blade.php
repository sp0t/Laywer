@extends('layouts.auth')

@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background: rgb(2,0,36);
background: linear-gradient(36deg, rgba(2,0,36,1) 0%, rgba(135,89,46,1) 21%, rgba(224,148,52,0.9668242296918768) 35%, rgba(110,180,155,1) 100%, rgba(0,212,255,1) 100%);">

    <!-- Inner content -->
    <div class="content-inner" style="display: unset !important;margin-top: 10%;">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <!-- Login form -->
            <form class="login-form" action="{{ route('login.post'); }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('common.errors')
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{URL::asset('assets/img/mypocketlawyer-logo.png')}}" style="height: 50px;">
                            <h1 style="color: #5d5142;"><b>MY POCKET LAWYER</b></h1>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #e09434;border-color: #fc7b86">Sign in</button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">Powered By: <a href="https://syncbridge.com/" target="_blank" style="color:white;">Syncbridge.com</a></div>
            </form>
            <!-- /login form -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /inner content -->

</div>
<!-- /main content -->
@endsection
