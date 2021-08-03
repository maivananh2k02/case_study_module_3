@extends('pages.layout_user.master')
@section('content')
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
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt=""/>
                                    <img src="images/home/pricing.png" class="pricing" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl2.jpg" class="girl img-responsive" alt=""/>
                                    <img src="images/home/pricing.png" class="pricing" alt=""/>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl3.jpg" class="girl img-responsive" alt=""/>
                                    <img src="images/home/pricing.png" class="pricing" alt=""/>
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh muc san pham</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $item)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="{{'/category/'.$item->id_category}}">{{$item->name_category}}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thuong hieu</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $i)
                                        <li><a href="{{'/brand/'.$i->id_brand}}"> <span
                                                    class="pull-right">(50)</span>{{$i->name_brand}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">san pham moi</h2>
                        @foreach($product as $all)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                                <input type="hidden" class="cart_product_id_{{$all->id}}" value="{{$all->id}}">
                                                <input type="hidden" class="cart_product_name_{{$all->id}}" value="{{$all->name}}">
                                                <input type="hidden" class="cart_product_image_{{$all->id}}" value="{{$all->image}}">
                                                <input type="hidden" class="cart_product_price_{{$all->id}}" value="{{$all->price}}">
                                                <input type="hidden" class="cart_product_qty_{{$all->id}}" value="1">
                                                <a href="{{'/detail/'.$all->id}}"><img
                                                        src="uploads/product/{{$all->image}}" alt=""/></a>
                                                <h2>{{number_format($all->price).' VND'}}</h2>
                                                <p>{{$all->name}}</p>
                                                <button type="button" class="btn btn-default add-to-cart" data-id="{{$all->id}}" >add cart
                                                </button>
                                            </form>
                                            <a class="beta-btn primary"
                                               href="{{'/detail/'.$all->id}}">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>them yeu thich</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>so sanh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection
