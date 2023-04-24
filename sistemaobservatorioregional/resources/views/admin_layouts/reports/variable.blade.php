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
    <form role="form text-left" method="post" action="{{route('subVariables.by.variables')}}">
      @csrf
      <h1>Generacion de Reportes</h1>
      <label for="dropdownMenuButton">Variable</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Variable">
          Selecciona la variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-variable">
          @foreach ($variables as $variable) 
            <li><a class="dropdown-item" id="variable_id_drop" name="variable_id_drop" href="#" value="{{$variable->variable_id}}">{{$variable->variable_name}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="variable_dimension_id" name="variable_dimension_id" value="">
      </div>

        <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Seleccionar Sub Variable</a></button>
    </form>
    <form role="form text-left" method="post" action="{{route('variable.insert')}}">
        <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Generar Reporte</a></button>
    </form>
  </div>
@endsection

@section('scripts')
<script>
  //Cambiar el valor del boton dropdown
 $(".dropdown-toggle").next(".dropdown-menu").children().on("click",function(){
        $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
    });


  //Agarrar el dato del dropdown y asignarlo al input hidden
  $(document).ready(function()
  {
    $("#dropdown-menu-variable li a").click(function() 
    {
      variable_id_value = $(this).attr('value');
      variable_name_value = $(this).text();
      $("#variable_dimension_id").val(variable_id_value);
    });
  });

  $(document).ready(function() {
  $("#dropdown-menu-variable li a").click(function() {
    variable_id_value = $(this).attr('value');
    variable_name_value = $(this).text();
    $("#variable_dimension_id").val(variable_id_value);

    // Habilitar los botones cuando se selecciona una variable
    $('button[type="submit"]').prop('disabled', false);
  });

  // Deshabilitar los botones por defecto
  $('button[type="submit"]').prop('disabled', true);
});
  
</script>
@endsection