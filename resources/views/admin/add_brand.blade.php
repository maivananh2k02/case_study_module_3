@extends('admin.layout_admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Brand
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('admin.saveBrand')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">ten thuong hieu</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                       placeholder="Ten loai">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mo ta thuong hieu</label>
                                <textarea style="resize: none" class="form-control" name="desc" id="exampleInputPassword1"
                                          placeholder="Mo ta danh muc..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hien Thi</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">an</option>
                                    <option value="1">hien</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">them</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

