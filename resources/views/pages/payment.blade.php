@extends('pages.layout_user.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="review-payment">
                <h2>Xem lai gio hang</h2>
            </div>
            <div class="table-responsive cart_info">
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
                                    <h4 style="margin: 40px">Chon hinh thuc thanh toan:</h4>
                                    <form action="{{route('order')}}" method="post">
                                        @csrf
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input name="payment_option" value="1"
                                               type="checkbox"> thanh toan bang ATM
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input name="payment_option" value="2" type="checkbox"> nhan tien mat
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input name="payment_option" value="3" type="checkbox"> nhan qua the ghi
                                        no

                                        <input type="submit" class="btn btn-primary" value="dat hang">
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
    </section>
@endsection
