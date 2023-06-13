@extends('admin_layouts.admin_nav')

@section('crud_content')

<!--CSS que hace que la seccion que no sea current no aparezca -->
<style>
    .form-section {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
        /* Espacio entre las columnas */
    }



    .hidden {
        display: none;
    }

    .form-section.current {
        display: inherit;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        color: red;
    }
</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header text-white">
                <h4 class="text-center">Crear Indicador de manera dinamica</h4>
            </div>
            <div class="card-body">
                <form id="form" class="contact-form" method="post" action="{{route('dynamic_indicator.insert')}}">
                    @csrf
                    <div class="form-section">


                        <div class="dropdown column">
                            <div>
                                <label for="dropdownMenuButton">Dimension: </label>
                            </div>
                            <button class="btn btn-outline-success dropdown-toggle" type="button"
                                name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false" text="Dimension">
                                Selecciona la dimension
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown_menu_dimension">
                                @foreach ($dimensions as $dimension)
                                <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#"
                                        value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <input type="hidden" id="dimension_id" name="dimension_id" value="none">
                        </div>


                        <div id="variable-section" class="dropdown hidden column">
                            <div>
                                <label id="variable-label" class="hidden" for="dropdownMenuButtonVariable">Variable:
                                </label>
                            </div>
                            <button class="btn btn-outline-success dropdown-toggle" type="button"
                                name="dropdownMenuButtonVariable" id="dropdownMenuButtonVariable"
                                data-bs-toggle="dropdown" aria-expanded="false" text="Variable">
                                Selecciona la variable
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonVariable"
                                id="dropdown_menu_variable">
                                {{-- Aqui se llena por medio de Ajax --}}

                            </ul>
                            <input type="hidden" id="variable_id" name="variable_id" value="none">
                        </div>


                        <div id="subvariable-section" class="dropdown hidden column">

                            <div>
                                <label id="subvariable-label" class="hidden" for="dropdownMenuButtonSub">Sub-Variable:
                                </label>
                            </div>
                            <button class="btn btn-outline-success dropdown-toggle" type="button"
                                name="dropdownMenuButtonSub" id="dropdownMenuButtonSub" data-bs-toggle="dropdown"
                                aria-expanded="false" text="SubVariable">
                                Selecciona la sub-variable
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSub" id="dropdown-menu-sub">
                                {{-- Aqui se llena por medio de Ajax --}}
                            </ul>
                            <input type="hidden" id="sub_variable_id" name="sub_variable_id" value="none">
                        </div>

                    </div>
                    <br />

                    <label for="dropdownMenuButtonRegion">Region: </label>
                    <div class="dropdown">
                        <button class="btn bg-gradient-warning dropdown-toggle" type="button"
                            name="dropdownMenuButtonRegion" id="dropdownMenuButtonRegion" data-bs-toggle="dropdown"
                            aria-expanded="false" text="Dimension" onclick="loadRegions()">
                            Selecciona la region
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonRegion" id="dropdown-menu-region">
                            {{-- Aqui se llena por medio de Ajax --}}
                        </ul>
                        <input type="hidden" id="region_id" name="region_id" value="none">
                    </div>

                    <label for="indicator_name">Nombre del indicador</label>
                    <input type="text" name="indicator_name" id="indicator_name" class="form-control"
                        placeholder="Nombre del indicador" required>
                    <br />

                    <label for="variable-type">Tipo de indicador:&nbsp;</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" id="variable-type">

                        <label class="btn active">
                            <input type="radio" name="options" id="option1" autocomplete="off" value="1" checked>
                            Cuantitativo
                        </label>
                        <label class="btn">
                            <input type="radio" name="options" id="option2" autocomplete="off" value="2">
                            Cualitativo
                        </label>
                        <input type="hidden" name="variable_type_id" id="variable_type_id" class="form-control"
                            value="">
                    </div>
                    <br />


                    <label id="label-units" for="dropdownMenuButtonMeasurement">Unidad de medida: </label>
                    <div id="dropdown-menu-unit" class="dropdown">
                        <button class="btn bg-gradient-info dropdown-toggle" type="button"
                            name="dropdownMenuButtonMeasurement" id="dropdownMenuButtonMeasurement"
                            data-bs-toggle="dropdown" aria-expanded="false" text="Medida" onclick="loadmeasurement()">
                            Selecciona la unidad
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonMeasurement"
                            id="dropdown-menu-measurement">
                            {{-- Aqui se llena por medio de Ajax --}}
                        </ul>
                        <input type="hidden" id="measurement_unit_id" name="measuremente_unit_id" value="none">
                    </div>
                    <br />
            </div>

            <div class="form-section">

                <div class="btn-group btn-group-toggle" id="cuantitativo_form_toggle">
                    <div class="dropdown">
                        <button class="btn bg-gradient-warning dropdown-toggle" type="button"
                            name="dropdownMenuButtonYear" id="dropdownMenuButtonYear" data-bs-toggle="dropdown"
                            aria-expanded="false" text="Year" onclick="loadYears()">
                            Año
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonYear" id="dropdown-menu-year">

                            {{-- Aqui se llena por medio de Ajax --}}

                        </ul>
                        <input type="hidden" id="year_id" name="year_id" value="">
                    </div>
                    <label for="reference_name">Referencia</label>
                    <input type="text" name="annio_dato" class="form-control" placeholder="fuente de información"
                        aria-label="reference_name" required>
                </div>

            </div>

            <div class="fomr-section">
                <label for="reference_name">Dato</label>
                <input type="text" name="reference_name" class="form-control" placeholder="dato"
                    aria-label="reference_name" required>
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

@endsection

@section('scripts')

<script>
    // Cargar regiones
    function loadRegions() {
    
        $.ajax({
            url: "{{ route('fetch.regions') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                var dropdownMenuRegion = $("#dropdown-menu-region");
                dropdownMenuRegion.empty();

                $.each(result.regions, function(key, value) {
                    var regionLink = $('<a class="dropdown-item" href="#" value="' + value.region_id + '">' + value.region_name + '</a>');
                    regionLink.on('click', function() {
                        $("#dropdownMenuButtonRegion").text(value.region_name); // Setea el nombre en el botón
                        $("#region_id").val(value.region_id); // Guarda el valor en un campo oculto si es necesario
                    });
                    dropdownMenuRegion.append($('<li></li>').append(regionLink));
                });
            }
        });

    }

    // Cargar unidades de medida según el tipo de indicador
    $(document).ready(function() {
        // Escuchar el evento de cambio en los radio buttons
        $('input[name="options"]').change(function() {
            var selectedValue = $(this).val();
            
            // Si se selecciona "Cuantitativo", mostrar el label y el ul de unidades de medida
            if (selectedValue === "1") {
                $('#label-units').show();
                $('#dropdown-menu-unit').show();
            } else {
                // Si se selecciona "Cualitativo", ocultar el label y el ul de unidades de medida
                $('#label-units').hide();
                $('#dropdown-menu-unit').hide();
            }
        });
    });

    //validacion de formulario

    $(document).ready(function() {
    // Escuchar el evento de envío del formulario
    $('#form').submit(function() {
        var referenceValue = $('#reference_name').val();
        
        // Expresión regular para verificar si es un enlace o texto
        var regex = /^[^\s]+(\s+[^\s]+)*$/;
        
        // Validar el valor con la expresión regular
        var isValid = regex.test(referenceValue);
        
        if (!isValid) {
            // Si no cumple con el formato esperado, mostrar un mensaje de error o tomar la acción deseada
            alert("Por favor, ingresa un enlace o texto válido en el campo de referencia.");
            
            // Detener el envío del formulario
            return false;
        }
        
        // Continuar con el envío del formulario si el valor es válido
        return true;
    });
});

    // Cargar años
    function loadYears() {
    $.ajax({
        url: "{{ route('fetch.years') }}",
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            var dropdownMenuYear = $("#dropdown-menu-year");
            dropdownMenuYear.empty();

            $.each(result.years, function(key, value) {
                var yearLink = $('<a class="dropdown-item" href="#" value="' + value.year_id + '">' + value.year_value + '</a>');
                yearLink.on('click', function() {
                    $("#dropdownMenuButtonYear").text(value.year_value); // Setea el nombre en el botón
                    $("#year_id").val(value.year_id); // Guarda el valor en un campo oculto si es necesario
                });
                dropdownMenuYear.append($('<li></li>').append(yearLink));
            });
        }
    });
}


    function loadmeasurement(){

     //Cargar unidades de medida
     $.ajax({
        url: "{{ route('fetch.measurements') }}",
        type: "POST",
        data: {
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            var dropdownMenuMeasurement = $("#dropdown-menu-measurement");
            dropdownMenuMeasurement.empty();

            $.each(result.measurement_units, function(key, value) {
                var measurementLink = $('<a class="dropdown-item" href="#" value="' + value.measurement_unit_id + '">' + value.measurement_unit_description + '</a>');
                measurementLink.on('click', function() {
                    $("#dropdownMenuButtonMeasurement").text(value.measurement_unit_description); // Setea el nombre en el botón
                    $("#measurement_unit_id").val(value.measurement_unit_id); // Guarda el valor en un campo oculto si es necesario
                });
                dropdownMenuMeasurement.append($('<li></li>').append(measurementLink));
            });
        }
    });


    }

    const form = document.querySelector('form');
    const select = document.querySelector('#annio');
    const yearIdInput = document.querySelector('#year_id');

    form.addEventListener('submit', (event) => {
      event.preventDefault();

      const selectedYear = select.value;
      yearIdInput.value = selectedYear;

      form.submit();
    });


     //Cambiar el valor del boton dropdown (MENOS VARIABLE Y SUBVARIABLE PUES SON DINAMICOS)
    $(".dropdown-toggle").next(".dropdown-menu").children().on("click",function(){
        $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
    });

    //Unidad de medida
    $("#dropdown-menu-measurement li a").click(function()
    {
        var unidad_medida_id = $(this).attr("value");
        $("#measuremente_unit_id").val(unidad_medida_id);
    });

        //Region
    $("#dropdown-menu-region li a").click(function() 
    {
        region_id_value = $(this).attr('value');
        $("#region_id").val(region_id_value);
    });

    //Dimension
    $("#dropdown_menu_dimension li a").on('click',function() 
    {
  
        // Mostrar sección de variable
        $('#variable-section').removeClass('hidden');
        $('#variable-label').removeClass('hidden');
        dimension_id_value = $(this).attr('value');
        $("#dimension_id").val(dimension_id_value);
        $("#variable_id").val('none');
        $("#sub_variable_id").val('none');
        $('#dropdownMenuButtonVariable').text('SELECCIONE LA VARIABLE'); //Setea el nombre en el texto del boton de variable
        $('#dropdownMenuButtonSub').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable
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
                    //$('#dropdownMenuButtonVariable').html('Seleccione la variable');
                    $.each(result.variables, function (key, value) {
                        $("#dropdown_menu_variable")
                        .append('<li><a class="dropdown-item" href="javascript:void(0);" onclick="clickAndFill_Variable(this,'+value.variable_id+')" value="'+value.variable_id+'" variable_nombre="'+value.variable_name+'">'+value.variable_name+'</a></li>');
                    });
                    $('#dropdownMenuButtonSub').html('Seleccione la sub-variable');
                    $("#variable_id").val('none');
                    $("#sub_variable_id").val('none');
                }
            });
    });

    function clickAndFill_Variable(element,variable_id_value) 
    {    
        $("#dropdown-menu-sub").empty().off('click');
        $('#dropdownMenuButtonVariable').text($(element).attr('variable_nombre')); //Setea el nombre en el texto del boton
        $("#variable_id").val(variable_id_value); //Setea el valor en el input hidden
        $("#sub_variable_id").val('none');
        $('#dropdownMenuButtonSub').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable
        // Mostrar sección de subvariable
        $('#subvariable-section').removeClass('hidden');
        $('#subvariable-label').removeClass('hidden');
        // //Ajax
        $("#dropdown_menu_sub").html('');
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

      
    }

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
        $('.contact-form').parsley().whenValidate({
            group: 'block-' + curIndex()
        }).done(function() {
            navigateTo(curIndex() + 1);
        });
    });

    // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    navigateTo(0); // Start at the beginning
    $('#variable-section').addClass('hidden');
    $('#subvariable-section').addClass('hidden');

</script>

<script type="text/javascript">
    //Script para checkbox de tipo de variable
    $(document).ready(function(){
        $('#variable-type input').on('change', function() {
            $('#variable_type_id').val($('input[name=\'options\']:checked', '#variable-type').val());
            $selected = $('#variable_type_id').val();
            
        });
    });
    
</script>
@endsection