@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke danh muc thuong hieu San Pham
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Ten danh muc</th>
                        <th>Hien Thi</th>
                        <th>Ngay them</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brand as $item)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td>{{$item->name_brand}}</td>
                            <td><span class="text-ellipsis">
                                @if($item->status_brand==0)
                                        <a href="{{'/un_brand_action/'.$item->id_brand}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: red;border-radius: 25%;width: 50px">An</p></a>
                                    @else
                                        <a href="{{'/brand_action/'.$item->id_brand}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: green;border-radius: 25%;width: 50px">Hien</p></a>
                                    @endif
                                </span>
                            </td>
                            <td><span class="text-ellipsis">Ngay them </span></td>
                            <td>
                                <a href="{{'/brand_edit/'.$item->id_brand}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                                </a>
                                <a href="{{'/brand_delete/'.$item->id_brand}}" class="active" ui-toggle-class=""
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
