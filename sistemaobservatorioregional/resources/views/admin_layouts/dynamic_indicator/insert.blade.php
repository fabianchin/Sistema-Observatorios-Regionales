@extends('admin_layouts.admin_nav')

@section('crud_content')

  <!--CSS que hace que la seccion que no sea current no aparezca -->
<style>
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

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header text-white">
                <h5>Crear Indicador de manera dinamica</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="contact-form" method="post" action="{{route('dynamic_indicator.insert')}}">
                    @csrf
                    <div class="form-section">
                        <label for="indicator_name">Nombre del indicador</label>
                        <input type="text" name="indicator_name" id="indicator_name" class="form-control" placeholder="Nombre del indicador" required>
                        <br/>

                        <label for="indicator_description">Descripcion del indicador</label>
                        <input type="text" name="indicator_description" id="indicator_description" class="form-control" placeholder="Descripcion del indicador" required>
                        <br/>

                        <label for="indicator_code">Código del indicador</label>
                        <input type="text" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="indicator_code" id="indicator_code" class="form-control" placeholder="Codigo del indicador" required>
                        <br/>

                        <label for="variable-type">Tipo de indicador:&nbsp;</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" id="variable-type">
                            
                            <label class="btn active">
                                <input type="radio" name="options" id="option1" autocomplete="off" value="1" > Cuantitativo
                            </label>
                            <label class="btn">
                                <input type="radio" name="options" id="option2" autocomplete="off" value="2"> Cualitativo
                            </label>
                            <input type="hidden" name="variable_type_id" id="variable_type_id" class="form-control" value="none">
                        </div>
                        <div id="radio_error"></div>
                        <br/>

                        
                        {{-- <div class="measurement_toggle"> --}}
                            <label for="dropdownMenuButtonMeasurement">Unidad de medida: </label>
                            <div class="dropdown">
                                <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonMeasurement" id="dropdownMenuButtonMeasurement" data-bs-toggle="dropdown" aria-expanded="false" text="Medida">
                                Selecciona la unidad
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonMeasurement" id="dropdown-menu-measurement">
                                    @foreach ($measurements as $measurement) 
                                        <li><a class="dropdown-item" href="#" value="{{$measurement->measurement_unit_id}}">{{$measurement->measurement_unit_description}}</a></li>
                                    @endforeach
                                    {{-- <li><a class="dropdown-item"  value="1">No aplica</a></li>
                                    <li><a class="dropdown-item"  value="2">Litros</a></li>
                                    <li><a class="dropdown-item"  value="3">Kg</a></li>
                                    <li><a class="dropdown-item"  value="4">Centrimetros</a></li> --}}

                                </ul>
                                <input type="hidden" id="measuremente_unit_id" name="measuremente_unit_id" value="none">
                            </div>
                            <br/>
                        {{-- </div> --}}
                        

                        {{-- <div class="btn-group btn-group-toggle"  id="cbs-group"> --}}
                            <label for="dropdownMenuButton">Dimension: </label>
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" 
                                data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
                                Selecciona la dimension
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown_menu_dimension">
                                @foreach ($dimensions as $dimension) 
                                    <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
                                @endforeach
                                </ul>
                                <input type="hidden" id="dimension_id" name="dimension_id" value="none">
                            </div>

                            <label for="dropdownMenuButtonVariable">Variable: </label>
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" name="dropdownMenuButtonVariable" 
                                id="dropdownMenuButtonVariable" 
                                data-bs-toggle="dropdown" aria-expanded="false" text="Variable">
                                Selecciona la variable
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonVariable" 
                                id="dropdown_menu_variable" >
                                    {{-- Aqui se llena por medio de Ajax --}}

                                </ul>
                                <input type="hidden" id="variable_id" name="variable_id" value="none">
                            </div>

                            <label for="dropdownMenuButtonSub">Sub-Variable: </label>
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" 
                                type="button" 
                                name="dropdownMenuButtonSub" 
                                id="dropdownMenuButtonSub" 
                                data-bs-toggle="dropdown" aria-expanded="false" text="SubVariable">
                                Selecciona la sub-variable
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSub" id="dropdown-menu-sub">
                                {{-- Aqui se llena por medio de Ajax --}}
                                </ul>
                                <input type="hidden" id="sub_variable_id" name="sub_variable_id" value="none">
                            </div>
                        {{-- </div> --}}
                        <br/>
                        
                        <label for="dropdownMenuButtonRegion">Region: </label>
                        <div class="dropdown">
                            <button class="btn bg-gradient-warning dropdown-toggle" type="button" name="dropdownMenuButtonRegion" id="dropdownMenuButtonRegion" data-bs-toggle="dropdown" aria-expanded="false" text="Dimension">
                            Selecciona la region
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonRegion" id="dropdown-menu-region">
                            @foreach ($regions as $region) 
                                <li><a class="dropdown-item"  href="#" value="{{$region->region_id}}">{{$region->region_name}}</a></li>
                            @endforeach
                        </ul>
                            <input type="hidden" id="region_id" name="region_id" value="none">
                        </div>

                    </div>

                    <div class="form-section">
                        <button type="button" class="btn btn-info add_ref">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                            </svg>
                            Agregar nueva referencia
                        </button>

                        <div class="refsInputs">
                            <label for="reference_name"><h3>Referencia</h3></label>
                            <input type="text" name="reference_name_[0]" id="reference_name_[0]" class="form-control" placeholder="Referencia" aria-label="reference_name" required>  
                        </div>
                        
                        <button type="button" class="btn btn-info add_ref">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                            </svg>
                            Agregar nueva referencia
                        </button>
                    </div>

                    <div class="form-section">   
                        
                        {{-- Si se escogio cuantitativo --}}
                        <div class="cuantitative_form" hidden="false">
                            <h3>Llenado de datos CUANTITATIVOS</h3><br/>
                            <button type="button" class="btn btn-info add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                Agregar año
                            </button>
                            
                            <div class="form-group row">
                                <div class="yearInputs">
                                    <input type="text" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'   id="datepicker_[0]" name="datepicker_[0]" placeholder="Año" /> <input type="number" id="cuantitative_value_[0]" name="cuantitative_value_[0]" placeholder="Dato..." /> <br/>
                                </div>
                            </div>
                        
                            <button type="button" class="btn btn-info add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                Agregar año
                            </button>

                        </div>
    
                        {{-- Si se escogio cuanlitativo --}}
                        <div class="cualitative_form" hidden="true">

                            <h3>Llenado de datos CUALITATIVOS</h3><br/>
                            <button type="button" class="btn btn-info add_list">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                Agregar Listado
                            </button>

                            <div class="form-group row">
                                <div class="listInputs">
                                    <input type="text" id="list_value_[0]" name="list_value_[0]" placeholder="Dato del listado" /> 
                                    {{-- <input type="number" id="cualitative_value_[0]" name="cualitative_value_[0]" placeholder="Dato..." /> <br/> --}}
                                </div>
                            </div>

                            <button type="button" class="btn btn-info add_list">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                Agregar Listado
                            </button>

                        </div>

                    </div>

                    <div class="form-navigation">
                        <button type="button" class="previous btn btn-primary float-left">Anterior</button>
                        <button type="button" class="next btn btn-success float-right">Siguiente</button>
                        <button type="submit" class="submit btn btn-success float-right">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    //Para verificacion de datos vacios del formulario
    var global_dimension_id_value="none";
    var global_variable_id_value="none";
    var global_subvariable_id_value="none";
    var global_unidad_medida_id_value="none";
    var global_region_id_value="none";

    //Control de formulario en base al tipo de indicador
    $('#variable-type input').on('change', function() {
        $('#variable_type_id').val($('input[name=\'options\']:checked', '#variable-type').val());
        $selected = $('#variable_type_id').val();
        if($selected == 1 || $selected == "none"){
            $('.cualitative_form').attr('hidden', true);
            $('.cuantitative_form').attr('hidden', false);
        }else{
            $('.cualitative_form').attr('hidden', false);
            $('.cuantitative_form').attr('hidden', true);
        }
    });
    
    //Cambiar el valor del boton dropdown (MENOS VARIABLE Y SUBVARIABLE PUES SON DINAMICOS)
    $(".dropdown-toggle").next(".dropdown-menu").children().on("click",function(){
        $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
    });

    //Obtencion de dato de: Unidad de medida
    $("#dropdown-menu-measurement li a").click(function()
    {
        var unidad_medida_id = $(this).attr("value");
        $("#measuremente_unit_id").val(unidad_medida_id);
        global_unidad_medida_id_value = unidad_medida_id;
    });

    
    //Obtencion de dato de: Region
    $("#dropdown-menu-region li a").click(function() 
    {
        region_id_value = $(this).attr('value');
        $("#region_id").val(region_id_value);
        global_region_id_value = region_id_value;
    });

    //Obtencion de dato de: Dimension
    $("#dropdown_menu_dimension li a").on('click',function() 
    {
        dimension_id_value = $(this).attr('value');
        $("#dimension_id").val(dimension_id_value);
        $("#variable_id").val('none');
        $("#sub_variable_id").val('none');
        $('#dropdownMenuButtonVariable').text('SELECCIONE LA VARIABLE'); //Setea el nombre en el texto del boton de variable
        $('#dropdownMenuButtonSub').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable

        global_dimension_id_value= dimension_id_value; //Guarda el valor de la dimension globalmente
        //Ajax
        $("#dropdown_menu_variable").html('');
            $.ajax
            ({
                url: "{{route('dynamic_indicator.fillVariable')}}",
                type: "POST",
                data: 
                {
                    dimension_id: dimension_id_value,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) 
                {
                    $.each(result.variables, function (key, value) {
                        $("#dropdown_menu_variable")
                        .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_Variable(this,'+value.variable_id+')" value="'+value.variable_id+'" variable_nombre="'+value.variable_name+'">'+value.variable_name+'</a></li>');
                    });
                    $('#dropdownMenuButtonSub').html('');
                    $('#dropdownMenuButtonSub').html('Seleccione la sub-variable');
                    $("#variable_id").val('none');
                    $("#sub_variable_id").val('none');
                }
            });
    });


    function clickAndFill_Variable(element,variable_id_value) 
    {
        //alert('Variable id: '+variable_id_value+', variable nombre: '+$(element).attr('variable_nombre'));    
        $('#dropdownMenuButtonVariable').text($(element).attr('variable_nombre')); //Setea el nombre en el texto del boton
        $("#variable_id").val(variable_id_value); //Setea el valor en el input hidden
        $("#sub_variable_id").val('none');
        $('#dropdownMenuButtonSub').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable

        global_variable_id_value = variable_id_value; //Guarda el valor de la variable globalmente
        // //Ajax
        $("#dropdown-menu-sub").html('');
        $.ajax
        ({
            url: "{{route('dynamic_indicator.fillSubVariable')}}",
            type: "POST",
            data: 
            {
                variable_id: variable_id_value,
                _token: '{{csrf_token()}}'

            },
            dataType: 'json',
            success: function (result) 
            {
                $.each(result.subvariables, function (key, value) {
                    $("#dropdown-menu-sub")
                     .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_SubVariable(this,'+value.sub_variable_id+')" sub_variable_nombre="'+value.sub_variable_name+'" value="'+value.sub_variable_id+'">'+value.sub_variable_name+'</a></li>');
                });
                 $('#dropdownMenuButtonSub').html('Seleccione la sub-variable');
                $("#sub_variable_id").val('none');
            }
        });
    }

    //Subvariable
    function clickAndFill_SubVariable(element,sub_variable_id_value) {
        $('#dropdownMenuButtonSub').text($(element).attr('sub_variable_nombre')); //Setea el nombre en el texto del boton
        $("#sub_variable_id").val(sub_variable_id_value); //Setea el valor en el input hidden
        global_subvariable_id_value = sub_variable_id_value; //Guarda el valor de la subvariable globalmente
    }

//REFERENCES----------------------------------------------------------------------------
var refIndex = 1;
//Funcion de boton de agregar listado
$(document).ready(function() {
    $('.add_ref').on('click', function() {
        //<input type="text" name="reference_name" class="form-control" placeholder="Referencia" aria-label="reference_name" required>
        // var fieldRefs = '<div class="insertedRefs"><input type="text" id="reference_name_'+refIndex+'" name="reference_name_'+refIndex+'" class="form-control" placeholder="Referencia..." required /><button onclick="removeInputFieldRefs(this);">Eliminar</button> <br/> </div>';
        var fieldRefs = '<div class="insertedRefs"><input type="text" id="reference_name_['+refIndex+']" name="reference_name_['+refIndex+']" class="form-control" placeholder="Referencia..." required /><button onclick="removeInputFieldRefs(this);">Eliminar</button> <br/> </div>';
        $('.refsInputs').append(fieldRefs);
        refIndex = refIndex+1;
    })
})

//Funcion de boton de eliminar l;istado
function removeInputFieldRefs (selectedField) {
    selectedField.closest('.insertedRefs').remove();
}   
//REFERENCES----------------------------------------------------------------------------

//CUANTITATIVO YEARS----------------------------------------------------------------------------
  //Variable para el datepicker actual
    var yearindex = 1;

    //Funcion de boton de agregar año
    $(document).ready(function() {
        $('.add').on('click', function() {
            var field = '<div class="insertedYears"><input type="text" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="datepicker_['+yearindex+']" name="datepicker_['+yearindex+']" placeholder="Año" required/> <input type="number" id="cuantitative_value_['+yearindex+']" name="cuantitative_value_['+yearindex+']" placeholder="Dato" required/> <button onclick="removeInputField(this);">Eliminar</button> <br/> </div>';
            $('.yearInputs').append(field);
            yearindex = yearindex+1;
            addDatePickerFormat();
        })
    })

    //Funcion de boton de eliminar año
    function removeInputField (selectedField) {
        selectedField.closest('.insertedYears').remove();
    }

    //Para el primer valor de datepicker
    $("#datepicker_[0]").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });    

    // array.forEach($("#datepicker_[]") => {
    //     $("#datepicker_").datepicker({
    //         format: "yyyy",
    //         viewMode: "years", 
    //         minViewMode: "years"
    //     });
    // });

    //Para los datepicker dinamicos
    function addDatePickerFormat(){
        for (var k = yearindex-1; k <= yearindex; k++) {
            $("#datepicker_["+k+"]").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years"
            });    
        }
    }

//CUANTITATIVO YEARS----------------------------------------------------------------------------

//CUALITATIVO LISTS----------------------------------------------------------------------------
  var listIndex = 1;
//Funcion de boton de agregar listado
$(document).ready(function() {
    $('.add_list').on('click', function() {
        // var fieldList = '<div class="insertedLists"><input type="text" id="list_value_['+listIndex+']" name="list_value_['+listIndex+']" placeholder="Dato del listado" required/> <input type="number" id="cualitative_value_['+listIndex+']" name="cualitative_value_['+listIndex+']" placeholder="Dato..." required/> <button onclick="removeInputFieldList(this);">Eliminar</button> <br/> </div>';
        var fieldList = '<div class="insertedLists"><input type="text" id="list_value_['+listIndex+']" name="list_value_['+listIndex+']" placeholder="Dato del listado" required/> <button onclick="removeInputFieldList(this);">Eliminar</button> <br/> </div>';
        $('.listInputs').append(fieldList);
        listIndex = listIndex+1;
    })
})

//Funcion de boton de eliminar l;istado
function removeInputFieldList (selectedField) {
    selectedField.closest('.insertedLists').remove();
}   
//CUANTITATIVO LISTS----------------------------------------------------------------------------

    //Formularios----------------------------------------------------------------------------------------------------------------
    var $sections = $('.form-section');
    function navigateTo(index) {
        // Mark the current section with the class 'current'
        $sections
            .removeClass('current')
            .eq(index)
            .addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        $('.form-navigation .previous').toggle(index > 0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function curIndex() {
        // Return the current index by looking at which section has the class 'current'
        return $sections.index($sections.filter('.current'));
    }

    // Previous button is easy, just go back
    $('.form-navigation .previous').click(function() {
        navigateTo(curIndex() - 1);
    });

    // Next button goes forward if current block validates
    $('.form-navigation .next').click(function() {
        //Verifica
        if(document.getElementById("option1").checked || document.getElementById("option2").checked){
            if( global_dimension_id_value !="none"
            && global_variable_id_value !="none" 
            && global_subvariable_id_value !="none"
            && global_unidad_medida_id_value !="none"
            && global_region_id_value !="none"
            )
            {
                $('.contact-form')
                .parsley()
                .whenValidate({
                    group: 'block-' + curIndex()
                })
                .done(function() {
                    navigateTo(curIndex() + 1);
                });
            }
            else{
                alert("Hay campos vacios o sin seleccionar.");
            }
        }else{
            $('#radio_error').html('<h6 class="warning">Debe seleccionar una opción</h6>');
        }
    });

    // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    navigateTo(0); // Start at the beginning
</script>
@endsection