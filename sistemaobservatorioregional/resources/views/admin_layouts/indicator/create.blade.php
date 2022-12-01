@extends('admin_layouts.admin_nav')

@section('crud_content')

<div class="card-body">
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @elseif (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif
    <form role="form text-left" method="post" action="{{route('indicator.insert')}}">
      @csrf
      <div class="mb-3">
          <label for="dimension_name">Nombre de la variable</label>
          <input type="text" name="indicator_name" class="form-control" placeholder="Nombre del indicador" aria-label="indicator_name" required>
      </div>

      <label for="dropdownMenuButton">Sub-Variable</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Sub-Variable">
          Selecciona la sub-variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-sub_variable">
          @foreach ($subs as $sub) 
            <li><a class="dropdown-item" href="#" value="{{$sub->sub_variable_id}}">{{$sub->sub_variable_name}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="sub_variable_id" name="sub_variable_id" value="">
      </div>
      
      <label for="dropdownMenuButtonType">Tipo de variable</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonType" id="dropdownMenuButtonType" data-bs-toggle="dropdown" aria-expanded="false" text="Sub-Variable">
          Selecciona el tipo de variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonType" id="dropdown-menu-type">
          @foreach ($vartypes as $vartype) 
            <li><a class="dropdown-item" href="#" value="{{$vartype->variable_type_id}}">{{$vartype->variable_type_category}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="variable_type_id" name="variable_type_id" value="">
      </div>

      <div class="container text-center">
        <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Guardar</a></button>
        <button type="button" class="btn bg-gradient-danger w-30 my-4 mb-2"><a style="color:white" href={{route('indicator.manage')}}>Regresar</a></button>
      </div>
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
    $("#dropdown-menu-sub_variable li a").click(function() 
    {
      sub_variable_id_value = $(this).attr('value');
      $("#sub_variable_id").val(sub_variable_id_value);
    });
    $("#dropdown-menu-type li a").click(function() 
    {
      variable_type_id_value = $(this).attr('value');
      $("#variable_type_id").val(variable_type_id_value);
    });
  });
  
</script>
@endsection