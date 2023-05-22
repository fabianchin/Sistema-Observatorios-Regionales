@extends('admin_layouts.admin_nav')

@section('crud_content')

<style>
    .inline-div {
        display: inline;
    }

    .form-section{
        display:none;
    }
    
    .form-section.current{
        display:inherit;
    }

    .parsley-errors-list{
        margin:2px 0 3px;
        padding:0;
        list-style-type:none;
        color:red;
    }

    .hidden {
        display: none;
    }

</style>


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
    <form role="form text-left" method="get" action="{{route('report.create')}}">
      @csrf

        <div class="dropdown inline-div" id="dimension">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonDimension" id="dropdownMenuButtonDimension" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
            Selecciona la dimensión
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDimension" id="dropdown-menu-dimension">
            @foreach ($dimensions as $dimension) 
            <li><a class="dropdown-item" name="dimension_id" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
            @endforeach
        </ul>
        <input type="hidden" id="dimension_id" name="dimension_id" value="none">
        </div>

      
      <div class="dropdown hidden inline-div" id="variable" >
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonVariable" id="dropdownMenuButtonVariable" data-bs-toggle="dropdown" aria-expanded="false" text="Variable" >
          Selecciona la variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-variable">
          {{-- Aqui se llena por medio de Ajax --}}
        </ul>
        <input type="hidden" id="variable_id" name="variable_id" value="none">
      </div>

      
        <div class="dropdown hidden inline-div" id="subVariable">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonSubVariable" id="dropdownMenuButtonSubVariable" data-bs-toggle="dropdown" aria-expanded="false" text="SubVariable" >
            Selecciona la subvariable
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSubVariable" id="dropdown-menu-subvariable">
          {{-- Aqui se llena por medio de Ajax --}}
        </ul>
        <input type="hidden" id="subvariable_id" name="subvariable_id" value="">
        </div>

        <div  class="dropdown hidden inline-div" id="indicator">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonIndicator" id="dropdownMenuButtonIndicator" data-bs-toggle="dropdown" aria-expanded="false" text="Indicator" >
            Selecciona el indicador
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonIndicator" id="dropdown-menu-indicator">
          {{-- Aqui se llena por medio de Ajax --}}
        </ul>
        <input type="hidden" id="indicator_id" name="indicator_id" value="">
        </div>


      <div class="container text-center">
        <button id="btn_genReport" class="btn bg-gradient-success w-30 my-4 mb-2" href={{route('sub_variable.insert')}} style="color:white">Generar Reporte</button>
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
      document.getElementById("btn_genReport").disabled = true;
    });

      $("#dropdown-menu-dimension li a").click(function() 
      {
        document.getElementById("btn_genReport").disabled = false;
        $('#variable').removeClass('hidden');
        $("#dropdown_menu_variable").html('');
        $("#dropdown-menu-variable").empty().off('click');
        $("#dropdown-menu-subvariable").empty().off('click');
        $("#dropdown-menu-indicator").empty().off('click');
        dimension_id_value = $(this).attr('value');
        $("#dimension_id").val(dimension_id_value);
        $("#variable_id").val('none');
        $("#subvariable_id").val('none');
        $("#indicator_id").val('none');
        $('#dropdownMenuButtonVariable').text('SELECCIONE LA VARIABLE'); //Setea el nombre en el texto del boton de variable
        $('#dropdownMenuButtonSubVariable').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable
        $('#dropdownMenuButtonIndicator').text('SELECCIONE EL INDICADOR');
        //Ajax
       
        $.ajax
        ({
                url: "{{route('report.fillVariable')}}",
                type: "POST",
                data: 
                {
                    dimension_id: dimension_id_value,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) 
                {
                    //$('#dropdownMenuButtonVariable').html('Seleccione la variable');
                    $.each(result.variables, function (key, value) {
                        $("#dropdown-menu-variable")
                        .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_Variable(this,'+value.variable_id+')" variable_nombre="'+value.variable_name+'" value="'+value.variable_id+'">'+value.variable_name+'</a></li>');
                    });
                    $('#dropdownMenuButtonSub').html('Seleccione la sub-variable');
                    $("#variable_id").val('none');
                    $("#sub_variable_id").val('none');
                    $("#indicator_id").val('none');
                }
          });
        });
         //fill variable
        function clickAndFill_Variable(element,variable_id_value) 
        {
            //alert('Variable id: '+variable_id_value+', variable nombre: '+$(element).attr('variable_nombre'));    
            $('#subVariable').removeClass('hidden');
            $('#dropdownMenuButtonVariable').text($(element).attr('variable_nombre')); //Setea el nombre en el texto del boton
            $("#variable_id").val(variable_id_value); //Setea el valor en el input hidden
            $('#dropdownMenuButtonSubVariable').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable
            $('#dropdownMenuButtonIndicator').text('SELECCIONE EL INDICADOR'); //Setea el nombre en el texto del boton de variable
            $("#dropdown-menu-subvariable").empty().off('click');
            $("#dropdown-menu-indicator").empty().off('click');
            $("#subvariable_id").val('none');
            $("#indicator_id").val('none');
            // //Ajax
            $("#dropdown-menu-subvariable").html('');
            $.ajax
            ({
                url: "{{route('report.fillSubVariable')}}",
                type: "POST",
                data: 
                {
                    variable_id: variable_id_value,
                    _token: '{{csrf_token()}}'
                    // _token:'{!! csrf_token() !!}'

                },
                dataType: 'json',
                success: function (result) 
                {
                    $.each(result.subvariables, function (key, value) {
                        $("#dropdown-menu-subvariable")
                        .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_SubVariable(this,'+value.sub_variable_id+')" sub_variable_nombre="'+value.sub_variable_name+'" value="'+value.sub_variable_id+'">'+value.sub_variable_name+'</a></li>');
                    });
                    $('#dropdownMenuButtonSubVariable').html('Seleccione la sub-variable');
                    $('#dropdownMenuButtonIndicator').text('SELECCIONE EL INDICADOR');
                    $("#indicator_id").val('none');
                    $("#sub_variable_id").val('none');
                }
            });
        }

        function clickAndFill_SubVariable(element,sub_variable_id_value) {
          //alert('Subvariable id: '+sub_variable_id_value+', subvariable nombre: '+$(element).attr('sub_variable_nombre'));    
          $('#indicator').removeClass('hidden');
          $('#dropdownMenuButtonSubVariable').text($(element).attr('sub_variable_nombre')); //Setea el nombre en el texto del boton
          $("#subvariable_id").val(sub_variable_id_value); //Setea el valor en el input hidden
          $('#dropdownMenuButtonIndicator').text('SELECCIONE EL INDICADOR');
          $("#indicator_id").val('none');
          $("#dropdown-menu-indicator").empty().off('click');
          $("#indicator_id").val('none');
          $.ajax
            ({
                url: "{{route('report.fillIndicator')}}",
                type: "POST",
                data: 
                {
                    Subvariable_id: sub_variable_id_value,
                    _token: '{{csrf_token()}}'
                    // _token:'{!! csrf_token() !!}'

                },
                dataType: 'json',
                success: function (result) 
                {
                  console.log(result.indicators);
                    $.each(result.indicators, function (key, value) {
                        $("#dropdown-menu-indicator")
                        .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_Indicators(this,'+value.indicator_id+')" indicator_nombre="'+value.indicator_name+'" value="'+value.indicator_id+'">'+value.indicator_name+'</a></li>');
                    });
                    $('#dropdownMenuButtonIndicator').text('SELECCIONE EL INDICADOR');
                    $("#indicator_id").val('none');
                }
            });
        }

        function clickAndFill_Indicators(element,indicator_id_value){
          $('#dropdownMenuButtonIndicator').text($(element).attr('indicator_nombre')); //Setea el nombre en el texto del boton
          $("#indicator_id").val(indicator_id_value); //Setea el valor en el input hidden
        }
    
</script>
@endsection