@extends('admin.layout_admin.master')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke chi tiet don hang
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
                        <th>Ten khach hang</th>
                        <th>tong</th>
                        <th>tinh trang don hang</th>
                        <th>Hien thi</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{'/view-order/'.$item->order_id}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                            </a>
                            <a href="{{'/delete-order/'.$item->order_id}}" class="active" ui-toggle-class=""
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
    <br><br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke chi tiet don hang
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
                        <th>Ten khach hang</th>
                        <th>tong</th>
                        <th>tinh trang don hang</th>
                        <th>Hien thi</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{'/view-order/'.$item->order_id}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                            </a>
                            <a href="{{'/delete-order/'.$item->order_id}}" class="active" ui-toggle-class=""
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
    <br><br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liet ke chi tiet don hang
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
                        <th>Ten khach hang</th>
                        <th>tong</th>
                        <th>tinh trang don hang</th>
                        <th>Hien thi</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{'/view-order/'.$item->order_id}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square text-success text-active" style="font-size: 20px"></i>
                            </a>
                            <a href="{{'/delete-order/'.$item->order_id}}" class="active" ui-toggle-class=""
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


