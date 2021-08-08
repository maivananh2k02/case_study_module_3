@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke danh muc Loai San Pham
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Ten danh muc</th>
                        <th>Hien Thi</th>
                        <th>Ngay them</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $item=>$value)
                        <tr>
                            <td>{{$item+=1}}</td>
                            <td>{{$value->name_category}}</td>
                            <td><span class="text-ellipsis">
                                @if($value->status_category==0)
                                        <a href="{{'/un_action/'.$value->id_category}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: red;border-radius: 25%;width: 50px">An</p></a>
                                    @else
                                        <a href="{{'/action/'.$value->id_category}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: green;border-radius: 25%;width: 50px">Hien</p></a>
                                    @endif
                                </span>
                            </td>
                            <td><span class="text-ellipsis">{{$value->created_at}} </span></td>
                            <td>
                                <a href="{{'/edit/'.$value->id_category}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                                </a>
                                <a href="{{'/delete/'.$value->id_category}}" class="active" ui-toggle-class="" onclick="confirm('are you sure?')">
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
