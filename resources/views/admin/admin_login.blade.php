<!DOCTYPE html>
<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="backend/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="backend/css/style.css" rel='stylesheet' type='text/css'/>
    <link href="backend/css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="backend/css/font.css" type="text/css"/>
    <link href="backend/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="backend/js/jquery2.0.3.min.js"></script>
</head>
<body>
@if(Session::has('success_logOut'))
    <span class="alert alert-success">{{Session::get('success_logOut')}}</span>
@endif
<div class="log-w3">
    <div class="w3layouts-main">
        @if(Session::has('defeat_home_email'))
            <p class="alert alert-danger" style="color: red" role="alert">{{Session::get('defeat_home_email')}}</p>
        @endif
        @if(Session::has('defeat_home_password'))
            <p class="alert alert-danger" style="color: red" role="alert">{{Session::get('defeat_home_password')}}</p>
        @endif
        <h2>Sign In Now</h2>
        <form action="{{route('admin.login')}}" method="post">
            @csrf
            <input type="email" class="vanh" name="email" placeholder="E-MAIL" required="">

            <input type="password" class="vanh" name="password" placeholder="PASSWORD" required="">

            <span><input type="checkbox"/>Remember Me</span>
            <h6><a href="#">Forgot Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Sign In">
        </form>
            <a href="/register-auth" class="btn btn-default">Dang ki Auth</a>
        <p>Don't Have an Account ?<a href="{{route('admin.showRegister')}}">Create an account</a></p>
    </div>
</div>
<script src="backend/js/bootstrap.js"></script>
<script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="backend/js/scripts.js"></script>
<script src="backend/js/jquery.slimscroll.js"></script>
<script src="backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="backend/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="backend/js/jquery.scrollTo.js"></script>
</body>
</html>
