@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke danh muc Loai San Pham
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
                    @foreach($category as $item)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td>{{$item->name}}</td>
                            <td><span class="text-ellipsis">
                                @if($item->status==0)
                                        <a href="{{'/un_action/'.$item->id}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: red;border-radius: 25%;width: 50px">An</p></a>
                                    @else
                                        <a href="{{'/action/'.$item->id}}"><p
                                                style="text-align: center;font-size: 15px;color: white;background-color: green;border-radius: 25%;width: 50px">Hien</p></a>
                                    @endif
                                </span>
                            </td>
                            <td><span class="text-ellipsis">Ngay them </span></td>
                            <td>
                                <a href="{{'/edit/'.$item->id}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                                </a>
                                <a href="{{'/delete/'.$item->id}}" class="active" ui-toggle-class="" onclick="confirm('are you sure?')">
                                    <i class="fa fa-times text-danger text" style="font-size: 20px"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
