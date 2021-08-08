@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke San Pham
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Ten san pham</th>
                        <th>hinh anh san pham</th>
                        <th>Danh muc san pham</th>
                        <th>Thuong hieu san pham</th>
                        <th>gia san pham</th>
                        <th>Hien Thi</th>
                        <th>ngay them</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $item=>$value)
                        <tr>
                            <td>{{$item+=1}}</td>
                            <td>{{$value->name}}</td>
                            <td><img src="uploads/product/{{$value->image}}" style="width: 100px;height: 100px"></td>
                            <td>{{$value->name_category}}</td>
                            <td>{{$value->name_brand}}</td>
                            <td>{{number_format($value->price)}} VND</td>
                            <td><span class="text-ellipsis">
                                @if($value->status==0)
                                        <a href="{{'/un_product_action/'.$value->id}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: red;border-radius: 25%;width: 50px">An</p></a>
                                    @else
                                        <a href="{{'/product_action/'.$value->id}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: green;border-radius: 25%;width: 50px">Hien</p></a>
                                    @endif
                                </span>
                            </td>
                            <td><span class="text-ellipsis">{{$value->created_at}}</span></td>
                            <td>
                                <a href="{{'/product_edit/'.$value->id}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                                </a>
                                <a href="{{'/product_delete/'.$value->id}}" class="active" ui-toggle-class=""
                                   onclick="confirm('are you sure?')">
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

