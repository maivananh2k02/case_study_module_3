@extends('admin.layout_admin.master')
@section('content')
        @if(Session::has('success_home'))
            <div class="alert alert-success">{{Session::get('success_home')}}</div>
        @endif
@endsection
