@extends('desk::layouts.master')

@section('content')
    <h1>Hello World</h1>
    @auth
    <div>
        <h3>Informasi Pengguna (JSON)</h3>
        <pre>{{ json_encode(Auth::user(), JSON_PRETTY_PRINT) }}</pre>
        <pre>{{ json_encode(session('menus'), JSON_PRETTY_PRINT) }}</pre>
        <pre>akses_module {{ json_encode(session()->get('akses_module'), JSON_PRETTY_PRINT) }}</pre>
    </div>
@endauth


    
@endsection
