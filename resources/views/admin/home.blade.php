@extends('admin.layout_admin.master')
@section('content')
        @if(Session::has('login'))
            <div class="alert alert-success">{{Session::get('login')}}</div>
        @endif
@endsection
