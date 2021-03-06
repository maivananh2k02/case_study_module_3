@extends('admin.layout_admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Brand
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{'/brand_update/'.$showBrand->id_brand}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loai San Pham</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                       value="{{$showBrand->name_brand}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mo ta danh muc</label>
                                <textarea style="resize: none" class="form-control" name="desc" id="exampleInputPassword1" >{{$showBrand->desc_brand}}</textarea>
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


