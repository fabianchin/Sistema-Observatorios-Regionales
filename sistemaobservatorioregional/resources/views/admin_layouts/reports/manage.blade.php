@extends('admin_layouts.admin_nav')
<style>
  table {
    border-collapse: collapse;
  }

  table td {
    border: 1px solid black;
    padding: 5px;
  }
</style>
@section('crud_content')
@if($state == 3)
  <h6>Variables de Dimension {{$dimensions->dimension_name}}</h6>
    <table border="2">
      <thead>
        <tr>
          <th>Variables</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($variables as $variable)
          <tr>
            <td>
                {{$variable->variable_name}} 
                <div style="margin-left: 20px;">
                    <strong>Sub Variables</strong> <br>
                    @foreach ($subVariables as $subVariable)
                        @if($subVariable->sub_variable_variable_id == $variable->variable_id)
                            -{{$subVariable->sub_variable_name}}<br>
                            <div style="margin-left: 20px;">
                            <strong>Indicadores</strong> <br>
                                @foreach ($indicators as $indicator)
                                    @if($indicator->indicator_sub_variable_id == $subVariable->sub_variable_id)
                                        {{$indicator->indicator_name}}<br>
                                    @endif
                                @endforeach
                            </div>  
                        @endif                   
                    @endforeach

                </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endif
@if($state == 2)
    <h6>Sub Variables de Variable: {{$variables->variable_name}}</h6>
    <table border="2">
        <thead>
            <tr>
                <th>Sub-Variables</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($subVariables as $subVariable)
            <tr>
                <td>
                    {{$subVariable->sub_variable_name}}
                    <div style="margin-left: 20px;">
                        <strong>Indicadores</strong> <br>
                            @foreach ($indicators as $indicator)
                                @if($indicator->indicator_sub_variable_id == $subVariable->sub_variable_id)
                                    {{$indicator->indicator_name}}<br>
                                @endif
                            @endforeach
                    </div>  

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@if($state == 1)
    <h6>Indicadores de la Sub Variable: {{$subVariables->sub_variable_name}}</h6>
        <table border="2">
            <thead>
                <tr>
                    <th>Indicadores</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indicators as $indicator)
                    <tr>
                        @if($indicator->indicator_sub_variable_id == $subVariables->sub_variable_id)
                            <td>{{$indicator->indicator_name}}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
@endif
@if($state == 0)
    <h6>Indicador: {{$indicators->indicator_name}}</h6>
        <table border="2">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Region</th>
                    <th>Tipo</th>
                    <th>Dato</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                <td>{{$indicators->indicator_name}}</td>
                <td>{{$region->region_name}}</td>
               </tr>
            </tbody>
        </table>
@endif

<a class="btn bg-gradient-danger w-30 my-4 mb-2" style="color:white" href={{route('report')}}>Regresar</a>
@endsection