@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke don hang
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>stt</th>
                        <th>Ten khach hang</th>
                        <th>tong</th>
                        <th>tinh trang don hang</th>
                        <th>thoi gian dat hang</th>
                        <th colspan="2" style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product_order as $item=>$value)
                        <tr>
                            <td>{{$item+=1}}</td>
                            <td>{{$value->customer_name}}</td>
                            <td>{{$value->order_total}}</td>
                            <td>{{$value->order_status}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                                <a href="{{'/view-order/'.$value->order_id}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                                </a>
                                <a href="{{'/delete-order/'.$value->order_id}}" class="active" ui-toggle-class="" onclick="confirm('are you sure?')">
                                    <i class="fa fa-times text-danger text" style="font-size: 20px"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

