@extends('pages.layout_user.master')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('pages.home')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
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
                        <th></th>
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
                                                   value="{{$value['qty']}}">

                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{number_format($total=$value['price']*$value['qty'])}}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{'/delete_cart/'.$value['session_id']}}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr {{$result+=$total}}>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Cart Sub Total <span>{{number_format($result)}}</span></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="cap nhat" class="btn btn-default check_out">
                                </td>
                                <td>
                                    <a class="btn btn-default check_out" href="{{route('delete_cart_all')}}">Xoa
                                        tat ca</a>
                                </td>
                            </tr>
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
                                @if(Session::get('customer_email')&&Session::get('customer_password'))
                                    <a class="btn btn-default check_out" href="/check-out-customer">Thanh toan</a>
                                @else
                                    <a class="btn btn-default check_out" href="/check_out">Thanh toan</a>
                                @endif
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
        <!--/#cart_items-->


@endsection
