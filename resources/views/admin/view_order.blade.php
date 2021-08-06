@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thong tin khach hang
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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$view_order['transport_name']}}</td>
                        <td>{{$view_order['transport_address']}}</td>
                        <td>{{$view_order['transport_phone']}}</td>
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
                        <th>Tong tien</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$view_order['product_name']}}</td>
                        <td>{{$view_order['product_sales_quantity']}}</td>
                        <td>{{$view_order['product_price']}}</td>
                        <td>{{$view_order['order_total']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


