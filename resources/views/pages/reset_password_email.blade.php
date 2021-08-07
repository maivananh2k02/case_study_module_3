@extends('pages.layout_user.master')
@section('content')
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">reset password</li>
        </ol>
    </div><!--/breadcrums-->
    <div class="container">
        <div class="row">
            <div class="login-form"><!--login form-->
                <h2>reset password to your account</h2>
                <form action="{{route('email_reset_password')}}" method="post">
                    @csrf
                    <input type="password" name="password" placeholder="New Pass Word"/>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
@endsection
