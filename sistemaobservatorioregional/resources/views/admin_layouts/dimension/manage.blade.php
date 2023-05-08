@extends('admin_layouts.admin_nav')

@section('crud_content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Administracion de dimensiones</h6>
          </div>
          <div class="text-center">
            
              <a class="btn bg-gradient-success w-50 my-4 mb-2" style="color:white" href="{{ route('dimension.redirectToCreateDimension') }}">Nueva</a>
            
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    
                   
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dimension</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ultima modificacion</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario que modifico</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dimensions as $dimension)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/logo-ct-dark.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$dimension->dimension_name}}</h6>
                        </div>
                      </div>
                    </td>
                    {{-- <td>
                      <p class="text-xs font-weight-bold mb-0">Manager</p>
                      <p class="text-xs text-secondary mb-0">Organization</p>
                    </td> --}}
                    <td class="text-xs font-weight-bold mb-0">
                      <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">Usuario XXXXX</p>
                    </td>
                    <td class="align-middle">
                      <a href="{{route('dimension.redirectToUpdateDimension').'?dimension_id='.$dimension->dimension_id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      {{-- SI FUNCIONA PERO PIERDE REF POR SLASH <a href="{{route('dimension.redirectToUpdateDimension',['dimension_id'=>$dimension->dimension_id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> --}}

                        <span style="color:white" class="badge badge-sm bg-gradient-success">Editar</span>
                      </a>
                      <!--<a href="{{route('dimension.delete', $dimension->dimension_id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                        <span style="color:white" class="badge badge-sm bg-gradient-danger">Eliminar</span>
                      </a>
                    -->
                    <a onclick="confirm_delete({{$dimension->dimension_id}},'{{$dimension->dimension_name}}')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                      <span style="color:white" class="badge badge-sm bg-gradient-danger">Eliminar</span>
                    </a>
                    <form style="display:none" action="{{route('dimension.delete', $dimension->dimension_id)}}" id="dimension_delete_{{$dimension->dimension_id}}">
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@include('components.confirm_delete')
@endsection