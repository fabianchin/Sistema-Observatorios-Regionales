@extends('admin_layouts.admin_nav')

@section('crud_content')

<div class="card-body">
  @if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @elseif (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif
    <form role="form text-left" method="post" action="{{route('report.create')}}">
      @csrf

      <label for="dropdownMenuButtonDimension">Dimensión</label>
        <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonDimension" id="dropdownMenuButtonDimension" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
            Selecciona la dimensión
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDimension" id="dropdown-menu-dimension">
            @foreach ($dimensions as $dimension) 
            <li><a class="dropdown-item" name="dimension_id" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
            @endforeach
        </ul>
        <input type="hidden" id="sub_variable_dimension_id" name="sub_variable_dimension_id" value="">
        </div>

      <label for="dropdownMenuButton">Variable</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Variable" >
          Selecciona la variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-variable">
          @foreach ($variables as $variable) 
            <li><a class="dropdown-item" name="variable_id" href="#" value="{{$variable->variable_id}}">{{$variable->variable_name}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="sub_variable_variable_id" name="sub_variable_variable_id" value="">
      </div>

      <label for="dropdownMenuButtonSubVariable">Subvariable</label>
        <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonSubVariable" id="dropdownMenuButtonSubVariable" data-bs-toggle="dropdown" aria-expanded="false" text="SubVariable" >
            Selecciona la subvariable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSubVariable" id="dropdown-menu-subvariable">
            @foreach ($subvariables as $subvariable) 
            <li><a class="dropdown-item" name="subvariable_id" href="#" value="{{$subvariable->sub_variable_id}}">{{$subvariable->sub_variable_name}}</a></li>
            @endforeach
        </ul>
        <input type="hidden" id="sub_variable_subvariable_id" name="sub_variable_subvariable_id" value="">
        </div>


        <label for="dropdownMenuButtonIndicator">Indicador</label>
        <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonIndicator" id="dropdownMenuButtonIndicator" data-bs-toggle="dropdown" aria-expanded="false" text="Indicator" >
            Selecciona el indicador
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonIndicator" id="dropdown-menu-indicator">
            @foreach ($indicators as $indicator) 
            <li><a class="dropdown-item" name="indicator_id" href="#" value="{{$indicator->indicator_id}}">{{$indicator->indicator_name}}</a></li>
            @endforeach
        </ul>
        <input type="hidden" id="sub_variable_indicator_id" name="sub_variable_indicator_id" value="">
        </div>


      <div class="container text-center">
        <button class="btn bg-gradient-success w-30 my-4 mb-2" href={{route('sub_variable.insert')}} style="color:white">Generar Reporte</button>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
<script>

$(".dropdown-toggle").next(".dropdown-menu").children().on("click",function(){
          $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
      });


    $(document).ready(function() {
        $("#dropdown-menu-dimension li a").click(function() 
        {
        sub_variable_id_value = $(this).attr('value');
        $("#sub_variable_dimension_id").val(sub_variable_id_value);
        });

        $("#dropdown-menu-variable li a").click(function() 
        {
        variable_type_id_value = $(this).attr('value');
        $("#sub_variable_variable_id").val(variable_type_id_value);
        });

        $("#dropdown-menu-subvariable li a").click(function() 
        {
        sub_variable_id_value = $(this).attr('value');
        $("#sub_variable_subvariable_id").val(sub_variable_id_value);
        });

        $("#dropdown-menu-indicator li a").click(function() 
        {
        variable_type_id_value = $(this).attr('value');
        $("#sub_variable_indicator_id").val(variable_type_id_value);
        });
        
    });


    //Cambiar el valor del boton dropdown




    
</script>
@endsection