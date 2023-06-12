<div style="margin: 0; padding: 0;">
  <img src="{{ $header }}" alt="Logo" style="width: 100%;">
</div>
<style>
    @page {
    margin: 0;
    }

  body {
    margin: 0;
  }

  img {
    width: 100%;
    margin: 0;
  }

  table {
    border-collapse: collapse;
    margin-left: 20px;
  }

    .whitespace::before {
    content: " ";
  }

  .whitespace::after {
    content: " ";
  }

  h1 {
    font-size: 28px;
    color: #FFF; /* Cambiamos el color de las letras a blanco */
    background-color: #000; /* Establecemos el fondo negro */
    text-align: center;
    margin-bottom: 10px;
    margin: 20px 0;
  }

  h2 {
    font-size: 20px;
    color: #FFF; /* Cambiamos el color de las letras a blanco */
    background-color: #000; /* Establecemos el fondo negro */
    text-align: center;
    margin-bottom: 10px;
    margin: 20px 0;
  }

h3 {
  font-size: 18px;
  color: #FFF;
  background-color: #878786;
  text-align: center;
  margin-bottom: 10px;
  margin: 20px 0;
  display: inline-block;
  align-items: center;
  padding: 0 10px;
}

  p {
    font-size: 14px;
    color: #000;
    text-align: left;
    margin-left: 20px;
    white-space: nowrap;
  }
  .overflow-table-container {
    page-break-inside: avoid;
    overflow-x: auto;
    margin-bottom: 20px;
  }

  .bordered-header {
    border: 1px solid #000;
    background-color: #c6c6c6;
    color: #FFF;
  }

  .colored-cell {
    border: 1px solid #000;
  } 

</style>

@if($state == 3)
  <h1>Reporte de Dimension {{$dimensions->dimension_name}}</h1>
  <h3>Variables de Dimension {{$dimensions->dimension_name}}</h3>
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
    <h1>Reporte de Dimension  {{$variables->variable_name}}</h1>
    <h3>Sub Variables de Variable: {{$variables->variable_name}}</h3>
    <div class="overflow-table-container">
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
    </div>
@endif
@if($state == 1)
    <h1>Reporte de Dimension  {{$subVariables->sub_variable_name}}</h1>
    <h3>Indicadores de la Sub Variable: {{$subVariables->sub_variable_name}}</h3>
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
    <h1>Reporte de Indicador  {{$indicators->indicator_name}}</h1>
    <h3>Indicador: {{$indicators->indicator_name}}</h3><br>
    <h3>Descripción</h3>
    @if($indicators->indicator_sub_variable_type == 1)
      <p>{!! nl2br(trim($indicator_data_cuantitative->indicator_data_description)) !!}</p>
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="bordered-header">Nombre</th>
            <th class="bordered-header">Region</th>
            <th class="bordered-header">Tipo</th>
            <th class="bordered-header">Unidad de medida</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="colored-cell">{{$indicators->indicator_name}}</td>
            <td class="colored-cell">{{ $region->region_name }}</td>
            @if($indicators->indicator_sub_variable_type == 1)
              <td class="colored-cell">Cuantitativo</td>
            @else
              <td class="colored-cell">Cualitativo</td>
            @endif
            <td class="colored-cell">{{ $measurement->measurement_unit_description }}</td>
          </tr>
        </tbody>
      </table>
        <br>
        <div class="overflow-table-container">
        @php
          $yearGroups = array_chunk($year, 7);
        @endphp

        @foreach ($yearGroups as $group)
          <table class="table">
            <thead >
              <tr>
                @foreach ($group as $ye)
                  <th class="bordered-header">&nbsp;{{$ye->year_value}}&nbsp;</th>
                @endforeach
              </tr>
            </thead>

            <tbody>
              <tr>
                @foreach ($group as $ye)
                  @php $dataFound = false; @endphp
                  @foreach ($year_data as $yedat)
                    @if ($ye->year_id == $yedat->year_id)
                      <td class="colored-cell">{{ $yedat->year_indicator_data }}</td>
                      @php $dataFound = true; @endphp
                      @break
                    @endif
                  @endforeach
                  @if (!$dataFound)
                    <td class="colored-cell">-</td>
                  @endif
                @endforeach
              </tr>
            </tbody>
          </table>
          <br><br> {{-- Agrega espacios en blanco entre las tablas --}}
        @endforeach
        </div>
    @else
      <br><h3>{!! nl2br(trim($indicator_data_cualitative->indicator_data_description)) !!}</h3>
      <table border="2">
            <thead>
                <tr>
                    <th class="bordered-header">Nombre</th>
                    <th class="bordered-header">Region</th>
                    <th class="bordered-header">Tipo</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td class="colored-cell">{{$indicators->indicator_name}}</td>
                <td class="colored-cell">{{ $region->region_name }}</td>  
                @if($indicators->indicator_sub_variable_type == 1)
                  <td class="colored-cell">Cuantitativo</td>
                @else
                  <td class="colored-cell">Cualitativo</td>
                @endif 
              </tr>
            </tbody>
        </table>
        <br>
          <table border="2">
            <thead>
              <tr>
                <th class="bordered-header">Listado</th>
                <th class="bordered-header">Dato</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $li)
                <tr>
                  <td class="colored-cell">{{ $li->list_name }}</td>
                  <td class="colored-cell">{{ $li->list_value }}</td>
                </tr>
              @endforeach         
            </tbody>
          </table>
        </div>
    @endif
    <h3>Referencias</h3>
    @foreach ($reference as $ref)
      <p>{{ $ref->reference_link }}</p>
    @endforeach
    <h2>Fecha de emision: {{$today}}</h2>
@endif
<div style="margin: 0; padding: 0;">
    <img src="{{ $footer }}" alt="footer" style="position: absolute; bottom: 0;">
</div>

