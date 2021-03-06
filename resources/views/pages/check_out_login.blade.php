@extends('pages.layout_user.master')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{route('customer_login')}}" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="Email" value="{{Session::get('email')}}" />
                            <input type="password" name="password" placeholder="Pass Word" value="{{Session::get('password')}}" />
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <p><a href="{{route('forgetPassword')}}">Forget Password?</a></p>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{route('add_customer')}}" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="Name"/>
                            <input type="email" name="email" placeholder="Email Address"/>
                            <input type="password" name="password" placeholder="Password"/>
                            <input type="number" name="phone" placeholder="Phone"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
