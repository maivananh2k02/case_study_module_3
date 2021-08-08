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
                                                    class="pull-right">({{count(\App\Models\Product::where('category_id',$item->id_category)->get())}})</span>{{$item->name_category}}
                                            </a>
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
                                                    class="pull-right">({{count(\App\Models\Product::where('brand_id',$i->id_brand)->get())}})</span>{{$i->name_brand}}
                                            </a></li>
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
                                                <input type="hidden" class="cart_product_id_{{$all->id}}"
                                                       value="{{$all->id}}">
                                                <input type="hidden" class="cart_product_name_{{$all->id}}"
                                                       value="{{$all->name}}">
                                                <input type="hidden" class="cart_product_image_{{$all->id}}"
                                                       value="{{$all->image}}">
                                                <input type="hidden" class="cart_product_price_{{$all->id}}"
                                                       value="{{$all->price}}">
                                                <input type="hidden" class="cart_product_qty_{{$all->id}}" value="1">
                                                <a href="{{'/detail/'.$all->id}}"><img
                                                        src="uploads/product/{{$all->image}}" alt=""/></a>
                                                <h2>{{number_format($all->price).' VND'}}</h2>
                                                <p>{{$all->name}}</p>
                                                @if(Session::get('customer_email')&&Session::get('customer_password'))
                                                    <button type="button" class="btn btn-primary add-to-cart"
                                                            data-id="{{$all->id}}">add cart
                                                    </button>
                                                @else
                                                    <a href="/check_out" class="btn btn-primary">add cart</a>
                                                @endif
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
