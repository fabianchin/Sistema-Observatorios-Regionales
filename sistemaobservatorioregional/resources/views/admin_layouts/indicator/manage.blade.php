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
            <h6>Administracion de indicadores</h6>
          </div>
          <div class="text-center">
            {{-- <div class="col-10 text-end"> --}}
            <button  type="button" class="btn bg-gradient-success w-50 my-4 mb-2">
              {{-- <button  type="button" class="btn bg-gradient-success mb-0"> --}}
              <a style="color:white" href="{{ route('indicator.redirectToCreateIndicator') }}">Nuevo</a>
            </button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <input class="form-control" id="searchTerm" type="text" placeholder="Buscar por Sub-Variable, indicador o tipo de dato..."  onkeyup="doSearch()"/>
              <table class="table align-items-center mb-0" id="table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Indicador</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sub-Variable</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo de dato</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($indicators as $indicator)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/logo-ct-dark.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$indicator->indicator_name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$indicator->indicator_code}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$indicator->indicator_sub_variable_id}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          @if($indicator->indicator_sub_variable_type == '1')
                          <h6 class="mb-0 text-sm"> Cuantitativo</h6>
                          @else
                          <h6 class="mb-0 text-sm"> Cualitativo</h6> 
                          @endif
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <a href="{{route('indicator.redirectToUpdateIndicator').'?indicator_id='.$indicator->indicator_id}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      {{-- SI FUNCIONA PERO PIERDE REF POR SLASH <a href="{{route('dimension.redirectToUpdateDimension',['dimension_id'=>$dimension->dimension_id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> --}}

                        <span style="color:white" class="badge badge-sm bg-gradient-success">Editar</span>
                      </a>
                      <a href="{{route('indicator.delete', $indicator->indicator_id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                        <span style="color:white" class="badge badge-sm bg-gradient-danger">Eliminar</span>
                      </a>
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
@endsection

@section('scripts')
<script>
  function doSearch() {
        
        var cont=1;
        var tableReg = document.getElementById('table');
        var searchText = document.getElementById('searchTerm').value.toLowerCase();
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('h6');
            var found = false;  
          
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[0].innerHTML.toLowerCase();
                var compareWith2 = cellsOfRow[1].innerHTML.toLowerCase();
                var compareWith3 = cellsOfRow[2].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true; 
                }else if(searchText.length == 0 || (compareWith2.indexOf(searchText) > -1)) {
                    found = true; 
                }else if(searchText.length == 0 || (compareWith3.indexOf(searchText) > -1)) {
                    found = true; 
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
                         
            } else {
               
                tableReg.rows[i].style.display = 'none';
                cont++;
            }
                   
        }
    
        // if(cont == tableReg.rows.length){
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'No hay articulos asociados a la búsqueda.',
        //     })
        // }
        cont=0;
    
    }
</script>