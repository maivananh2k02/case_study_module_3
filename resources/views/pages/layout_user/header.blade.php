<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 387 252 044</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> maihuyen2k02@gmai.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('pages.home')}}"><img src="uploads/product/vien-chong-nang-murad-logo-2.jpg" style="width: 100px" alt=""/></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-star"></i> yeu thich</a></li>
                            <li><a href="/show-cart"><i class="fa fa-shopping-cart"></i> gio hang</a></li>
                            @if(Session::get('customer_email')&&Session::get('customer_password'))
                                <li><a href="/payment"><i class="fa fa-crosshairs"></i>Thanh toan</a></li>
                                <li><a href="/logout-customer"><i class="fa fa-lock"></i> dang xuat</a></li>
                            @else
                                <li><a href="/check_out"><i class="fa fa-crosshairs"></i>Thanh toan</a></li>
                                <li><a href="{{route('login_check_in')}}"><i class="fa fa-lock"></i> dang nhap</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('pages.home')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">San pham<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="">Products</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <img src="uploads/product/duoc-my-pham-murad-banner-san-pham.jpg"
                                         style="width: 900px;height: 337px" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <img src="uploads/product/bannerwebvitaceyes_optimized-(1).jpg" style="width: 900px"
                                         alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <img src="uploads/product/murad-hydrating-toner.jpeg" style="width: 900px" alt="">
                                </div>
                            </div>
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
</header><!--/header-->
