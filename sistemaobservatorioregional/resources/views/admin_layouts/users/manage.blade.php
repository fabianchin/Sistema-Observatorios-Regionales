@extends('admin_layouts.admin_nav')




@section('crud_content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
  </div>

@endif
<main>
  <div class="container" >
    <h1>Usuarios</h1>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{route('perfil.destroy', $user->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                
            </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection

