@extends('admin.layout_admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Category
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{'/update/'.$showCategory->id_category}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loai San Pham</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                       value="{{$showCategory->name_category}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mo ta danh muc</label>
                                <textarea style="resize: none" class="form-control" name="desc" id="exampleInputPassword1" >{{$showCategory->desc_category}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info">update</button>
                            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Hủy</button>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

