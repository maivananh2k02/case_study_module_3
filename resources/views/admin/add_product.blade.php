@extends('admin.layout_admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('admin.saveProduct')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">ten san pham</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                       placeholder="Ten loai">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gia san pham</label>
                                <input type="number" class="form-control" name="price" id="exampleInputEmail1"
                                       placeholder="Ten loai">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">hinh anh san pham</label>
                                <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mo ta san pham</label>
                                <textarea style="resize: none" class="form-control" name="desc"
                                          id="exampleInputPassword1"
                                          placeholder="Mo ta danh muc..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Noi dung san pham</label>
                                <textarea style="resize: none" class="form-control" name="content_product"
                                          id="exampleInputPassword1"
                                          placeholder="Noi dung san pham..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hien Thi</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach($category as $item)
                                        <option value="{{$item->id_category}}">{{$item->name_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hien Thi</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach($brand as $i)
                                        <option value="{{$i->id_brand}}">{{$i->name_brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hien Thi</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">an</option>
                                    <option value="1">hien</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">them</button>
                            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Hủy</button>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


