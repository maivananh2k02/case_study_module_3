@extends('admin.layout_admin.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2"> Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">stt</th>
                            <th scope="col">Tên</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                       class="btn btn-default">Edit</a>
{{--                                    <a href=""--}}
{{--                                       data-url="{{ route('users.delete', ['id' => $user->id]) }}"--}}
{{--                                       class="btn btn-danger action_delete">Delete</a>--}}

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


