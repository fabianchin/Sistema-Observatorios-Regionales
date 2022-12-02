@extends('admin_layouts.admin_nav')

@section('crud_content')

<div class="container">
    <h1>Bienvenido ADMIN: <span>{{auth()->user()->name}} </span> </h1>
</div>

@endsection