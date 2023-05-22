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

  table td {
    border: 1px solid black;
    padding: 5px;
    margin-bottom: 5px;
  }

  h1 {
    font-size: 24px;
    color: #333;
    text-align: center;
    margin-bottom: 10px;
    margin: 20px 0;
  }

  h2 {
    font-size: 20px;
    color: #555;
    text-align: left;
    margin-left: 20px;
  }

  h3 {
    font-size: 18px;
    color: #777;
    text-align: left;
    margin-left: 20px;
  }


</style>

@if($state == 3)
  <h1>Reporte de Dimension {{$dimensions->dimension_name}}</h1>
  <h2>Fecha de emision: {{$today}}</h2>
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
    <h2>Fecha de emision: {{$today}}</h2>
    <h3>Sub Variables de Variable: {{$variables->variable_name}}</h3>
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
    <h1>Reporte de Dimension  {{$subVariables->sub_variable_name}}</h1>
    <h2>Fecha de emision: {{$today}}</h2>
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
    <h1>Reporte de Dimension  {{$indicators->indicator_name}}</h1>
    <h2>Fecha de emision: {{$today}}</h2>
    <h3>Indicador: {{$indicators->indicator_name}}</h3>
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
<div style="margin: 0; padding: 0;">
    <img src="{{ $footer }}" alt="footer" style="position: absolute; bottom: 0;">
</div>

