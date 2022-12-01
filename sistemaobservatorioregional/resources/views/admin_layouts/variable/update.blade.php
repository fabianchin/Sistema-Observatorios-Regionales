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

    <form role="form text-left" method="post" action="{{route('variable.update')}}">
        @csrf

        <div class="mb-3">
            <label for="dimension_name">Nombre de la variable</label>
            <input type="text" name="variable_name" class="form-control" placeholder="Nombre de la variable" aria-label="variable_name" required value="{{$variable->variable_name}}">
            <input type="hidden" name="variable_id" value="{{$variable->variable_id}}">
        </div>
  
        <label for="dropdownMenuButton">Dimension</label>
        <div class="dropdown">
          <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
            @for ($i = 0; $i < count($dimensions); $i++)
              @if ($dimensions[$i]->dimension_id == $variable->variable_dimension_id)
                {{$dimensions[$i]->dimension_name}}
              @endif     
            @endfor
            {{-- {{$dimensions[0]->dimension_id == $variable->variable_dimension_id ? $dimensions[0]->dimension_name : "Escoge la dimension"}} --}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-dimension">
            @foreach ($dimensions as $dimension) 
            @if ($variable->variable_dimension_id == $dimension->dimension_id)
            <li><a class="dropdown-item" selected="selected" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
            @else
              <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
            @endif
            @endforeach
          </ul>
          <input type="hidden" id="variable_dimension_id" name="variable_dimension_id" value="{{$variable->variable_dimension_id}}">
        </div>

        <div class="container text-center">
          <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Modificar</a></button>
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
    // $(".dropdown-toggle").next(".dropdown-menu").children().on("click",function(){
    //     $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
    // });
    $("#dropdown-menu-dimension li a").click(function() 
    {
      dimension_id_value = $(this).attr('value');
      dimension_name_value = $(this).text();
      $("#variable_dimension_id").val(dimension_id_value);
    });
  });
  
</script>
@endsection