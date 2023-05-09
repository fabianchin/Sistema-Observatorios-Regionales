@extends('admin_layouts.admin_nav')

@section('crud_content')

<table border="2">
  <thead>
    <tr>
      <th >Variables</th>
      <th >Sub-Variables</th>
      <th >Indicators</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($variables as $variable) 
    <tr>
    <td rowspan="{{ count($subVariables()->where('variable_id', $variable->variable_id)->get()) + 1 }}">{{$variable->variable_name}}</td>
    </tr>
      @foreach ($subVariables as $subVariable)
        @if($subVariable->sub_variable_variable_id == $variable->variable_id)
        <tr>
        <td rowspan="1">{{$subVariable->sub_variable_name}}</td>
        </tr>
        @endif
          @foreach ($indicators as $indicator)
          @if($indicator->indicator_sub_variable_id == $subVariable->sub_variable_id)
            <tr>
                <td rowspan="1">{{$indicator->indicator_name}}</td>
            </tr>
            @endif
          @endforeach
      @endforeach
    @endforeach
  </tbody>
</table>
@endsection