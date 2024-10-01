@extends('desk::layouts.master')

@section('content')
@include('desk::Dashboard.table')
@endsection

@section('plugins')
<script src="{{asset('modules/desk/js/')}}/dashboard/admin.js"></script>
@endsection