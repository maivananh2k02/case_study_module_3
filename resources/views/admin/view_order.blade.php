@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thong tin khach hang
                {{--                {{dd($view_order)}}--}}
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>ten khach hang</th>
                        <th>sdt</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$view_order['customer_name']}}</td>
                        <td>{{$view_order['customer_phone']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thong tin dia chi nhan hang
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Ten nguoi nhan</th>
                        <th>Dia chi nhan hang</th>
                        <th>So dien thoai nhan hang</th>
                        <th>emai nhan hang</th>
                        <th>note nhan hang</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$view_order['transport_name']}}</td>
                        <td>{{$view_order['transport_address']}}</td>
                        <td>{{$view_order['transport_phone']}}</td>
                        <td>{{$view_order['transport_email']}}</td>
                        <td>
                            <pre>{{$view_order['transport_note']}}</pre>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiet don hang
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Ten san pham</th>
                        <th>so luong</th>
                        <th>gia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detail_product as $value)
                        {{--                        {{dd($detail_product)}}--}}
                        <tr>
                            <td>{{$value->product_name}}</td>
                            <td>{{$value->product_sales_quantity}}</td>
                            <td>{{number_format($value->product_price)}} VND</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Tong tien : {{number_format($value->order_total)}} VND</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


