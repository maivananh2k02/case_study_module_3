@extends('pages.layout_user.master')
@section('content')
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
                                            <a href="{{'/category/'.$item->id_category}}"><span
                                                    class="pull-right">({{count(\App\Models\Product::where('category_id',$item->id_category)->get())}})</span>{{$item->name_category}}</a>
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
                                                    class="pull-right">({{count(\App\Models\Product::where('brand_id',$i->id_brand)->get())}})</span>{{$i->name_brand}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    @foreach($detail_product as $item)
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="uploads/product/{{$item->image}}" alt=""/>
                                </div>
                                <div id="similar-product" class="carousel slide" data-ride="carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href=""><img src="{{'frontend/images/similar1.jpg'}}" alt=""></a>
                                            <a href=""><img src="{{'frontend/images/similar2.jpg'}}" alt=""></a>
                                            <a href=""><img src="{{'frontend/images/similar3.jpg'}}" alt=""></a>
                                        </div>
                                    </div>

                                    <!-- Controls -->
                                    <a class="left item-control" href="#similar-product" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="right item-control" href="#similar-product" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <form>
                                        @csrf
                                        <input type="hidden" class="cart_product_id_{{$item->id}}"
                                               value="{{$item->id}}">
                                        <input type="hidden" class="cart_product_name_{{$item->id}}"
                                               value="{{$item->name}}">
                                        <input type="hidden" class="cart_product_image_{{$item->id}}"
                                               value="{{$item->image}}">
                                        <input type="hidden" class="cart_product_price_{{$item->id}}"
                                               value="{{$item->price}}">
                                        <input type="hidden" class="cart_product_qty_{{$item->id}}" value="1">
                                        <h2>{{$item->name}}</h2>
                                        <p>{{number_format($item->price).' VND'}}</p>
                                        @if(Session::get('customer_email')&&Session::get('customer_password'))
                                            <button type="button" class="btn btn-primary add-to-cart"
                                                    data-id="{{$item->id}}">add cart
                                            </button>
                                        @else
                                            <a href="/check_out" class="btn btn-primary">add cart</a>
                                        @endif
                                    </form>
                                    <p><b>Tinh trang:</b> Con hang</p>
                                    <p><b>Dieu kien:</b> New</p>
                                    <p><b>Thuong hieu:</b>{{$item->name_brand}}</p>
                                    <p><b>Danh muc:</b>{{$item->name_category}}</p>
                                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                                    alt=""/></a>
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->
                    @endforeach
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Mo ta</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Chi tiet</a></li>
                                <li><a href="#reviews" data-toggle="tab">Danh gia</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details">
                                <pre>{!! $item->content !!}</pre>
                            </div>

                            <div class="tab-pane fade" id="companyprofile">
                                <pre>{!! $item->desc !!}</pre>
                            </div>

                            <div class="tab-pane fade" id="reviews">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>

                                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                        <textarea name=""></textarea>
                                        <b>Rating: </b> <img src="images/product-details/rating.png" alt=""/>
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div><!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">san pham lien quan</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach($relatedProducts as $key=>$value)
                                        @if($value->id!=$item->id)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="uploads/product/{{$value->image}}" alt=""/>
                                                            <h2>{{number_format($value->price).' VND'}}</h2>
                                                            <p>{{$value->name}}</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Add
                                                                to cart</a>
                                                            <a class="beta-btn primary"
                                                               href="{{'/detail/'.$value->id}}">Details <i
                                                                    class="fa fa-chevron-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
