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
    <form role="form text-left" method="post" action="{{route('variable.insert')}}">
      @csrf
      <div class="mb-3">
          <label for="dimension_name">Nombre de la variable</label>
          <input type="text" name="variable_name" class="form-control" placeholder="Nombre de la variable" aria-label="variable_name" required>
      </div>

      <label for="dropdownMenuButton">Dimension</label>
      <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
          Selecciona la dimension
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-dimension">
          @foreach ($dimensions as $dimension) 
            <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
          @endforeach
        </ul>
        <input type="hidden" id="variable_dimension_id" name="variable_dimension_id" value="">
      </div>


      <div class="container text-center">
        <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Guardar</a></button>
        <button type="button" class="btn bg-gradient-danger w-30 my-4 mb-2"><a style="color:white" href={{route('variable.manage')}}>Regresar</a></button>
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
    $("#dropdown-menu-dimension li a").click(function() 
    {
      dimension_id_value = $(this).attr('value');
      dimension_name_value = $(this).text();
      $("#variable_dimension_id").val(dimension_id_value);
    });
  });
  
</script>
@endsection