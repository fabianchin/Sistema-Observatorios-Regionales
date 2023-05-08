@extends('admin_layouts.admin_nav')

@section('crud_content')

<div class="card-body">
  @if (session('success'))
  <div class="alert alert-success" style="color: white; ">
     <strong>{{ session('success') }}</strong> 
  </div>
  @elseif (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif
    <form role="form text-left" method="post" action="{{route('sub_variable.insert')}}">
      @csrf
      <div class="mb-3">
          <label for="sub_variable_name">Nombre de la sub-variable</label>
          <input type="text" name="sub_variable_name" class="form-control" placeholder="Nombre de la sub-variable" aria-label="sub_variable_name" required>
      </div>
      <div class="mb-3">
          <label for="sub_variable_code">Codigo de la sub-variable </label>
          <input type="text" name="sub_variable_code" class="form-control" placeholder="Código de la sub-variable" aria-label="sub_variable_code" required>
      </div>

      <label for="dropdownMenuButton">Variable</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
          Selecciona la variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-variable">
          @foreach ($variables as $variable) 
            <li><a class="dropdown-item" name="variable_id" href="#" value="{{$variable->variable_id}}">{{$variable->variable_name}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="sub_variable_variable_id" name="sub_variable_variable_id" value="">
      </div>


      <div class="container text-center">
        <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2" href={{route('sub_variable.insert')}} style="color:white">Guardar</button>
        <a class="btn bg-gradient-danger w-30 my-4 mb-2" style="color:white" href={{route('sub_variable.manage')}}>Regresar</a>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
<script>

// escucho por el click a la variable elegida para obtener el  valor de id y mandarlo a la controller
  $(document).ready(function() {
    $("#dropdown-menu-variable li a").click(function() {
      variable_id_value = $(this).attr('value');
      $("#sub_variable_variable_id").val(variable_id_value);
    });
  });

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
      //   dimension_name_value = $(this).text();
        $("#sub_variable_variable_id").val(variable_id_value);
      });
    });
    
</script>
@endsection