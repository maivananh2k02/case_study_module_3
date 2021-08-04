@extends('pages.layout_user.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as
                    Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>THONG TIN NHAN HANG</p>

                            <div class="form-two">
                                <form action="{{route('payment')}}" method="post">
                                    @csrf
                                    <input type="text" name="name" placeholder="Ho va ten ">
                                    <input type="text" name="email" placeholder="Email....">
                                    <input type="number" name="phone" placeholder="Phone *">
                                    <input type="text" name="address" placeholder="Address">
                                    <textarea name="note"
                                              placeholder="Notes about your order, Special Notes for Delivery"
                                              rows="16"></textarea>
                                    <input type="submit" value="xac nhan dat hang" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Xem lai gio hang</h2>
            </div>
            <div class="table-responsive cart_info">
                <form action="/update_cart" method="post">
                    @csrf
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <th class="image">image</th>
                            <th class="description">Ten san pham</th>
                            <th class="price">Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="total">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                    {{dd(Session::get('cart'))}}--}}
                        @if(Session::get('customer_email')&&Session::get('customer_password'))
                            @if(Session::get('cart'))
                                @php
                                    $result=0;
                                @endphp

                                @foreach(Session::get('cart') as $key=>$value)

                                    <tr>
                                        <td class="cart_product">
                                            <img src="uploads/product/{{$value['image']}}" alt="" width="90px">
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""></a>{{$value['name']}}</h4>
                                            <p>ID: {{$value['id']}}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{number_format($value['price'])}} VND</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">

                                                <input class="cart_quantity" type="number" min="1"
                                                       name="{{$value['session_id']}}"
                                                       value="{{$value['qty']}}" disabled>

                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{number_format($total=$value['price']*$value['qty'])}}</p>
                                        </td>
                                    </tr {{$result+=$total}}>
                        @endforeach
                    </table>
                </form>
                <section id="do_action">
                    <div class="container">
                        <div class="heading">
                            <h3>thanh Toan</h3>
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="total_area">
                                    <ul>
                                        <li>Cart Sub Total <span>{{number_format($result)}}</span></li>
                                        <li>Thue <span>$2</span></li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Tong sau phat sinh thanh
                                            toan:<span> {{number_format($result)}}</span></li>
                                    </ul>
                                    <a class="btn btn-default check_out" href="/check_out">Thanh toan</a>
                                    <form action="/coupon" method="post">
                                        @csrf
                                        <input type="text" class="form-control" name="coupon"
                                               placeholder="nhap ma giam gia">
                                        <input type="submit" class="btn btn-default check_coupon" name="coupon"
                                               value="Tinh ma giam gia"></input>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!--/#do_action-->
                </tbody>
                @endif
                @endif
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
