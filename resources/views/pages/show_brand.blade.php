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
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">{{$brand_name->name_brand}}</h2>
                        @foreach($brandById as $all)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="uploads/product/{{$all->image}}" alt=""/>
                                            <h2>{{number_format($all->price).' VND'}}</h2>
                                            <p>{{$all->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                            <a class="beta-btn primary"
                                               href="#">Details <i
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

