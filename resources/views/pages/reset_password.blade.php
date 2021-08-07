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
                <h2>Reset Password</h2>
                <form action="{{route('save_password')}}" method="post">
                    @csrf
                    <input type="email" name="email" placeholder="Email" />

                    <button type="submit" class="btn btn-default">kiem tra</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
@endsection
