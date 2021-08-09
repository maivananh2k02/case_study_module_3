@extends('admin.layout_admin.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data"
                      style="width: 100%;">
                    @csrf
                    <div class="form-group">
                        <label>Tên </label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               placeholder="Nhập tên vai trò"
                               value="{{ old('name') }}">

                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               placeholder="Nhập tên email"
                               value="{{ old('email') }}">

                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password"
                               class="form-control"
                               name="password"
                               placeholder="Nhập tên password">
                    </div>

                    <div class="form-group">
                        <label>vai tro</label>
                        <select name="role_id[]" class="form-control select2_init" >
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection

