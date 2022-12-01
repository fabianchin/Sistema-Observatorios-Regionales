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
                <form class="contact-form" method="post" action="{{route('dynamic_indicator.insert')}}">
                    @csrf
                    <div class="form-section">
                        <label for="indicator_name">Nombre del indicador</label>
                        <input type="text" name="indicator_name" id="indicator_name" class="form-control" placeholder="Nombre del indicador" required>
                        <br/>

                        <label for="variable-type">Tipo de indicador:&nbsp;</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" id="variable-type">
                            
                            <label class="btn active">
                                <input type="radio" name="options" id="option1" autocomplete="off" value="1" checked> Cuantitativo
                            </label>
                            <label class="btn">
                                <input type="radio" name="options" id="option2" autocomplete="off" value="2"> Cualitativo
                            </label>
                            <input type="hidden" name="variable_type_id" id="variable_type_id" class="form-control" value="">
                        </div>
                        <br/>

                        
                        {{-- <div class="measurement_toggle"> --}}
                            <label for="dropdownMenuButtonMeasurement">Unidad de medida: </label>
                            <div class="dropdown">
                                <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButtonMeasurement" id="dropdownMenuButtonMeasurement" data-bs-toggle="dropdown" aria-expanded="false" text="Medida">
                                Selecciona la unidad
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonMeasurement" id="dropdown-menu-measurement">
                                    {{-- @foreach ($dimensions as $dimension) 
                                        <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
                                    @endforeach --}}
                                    <li><a class="dropdown-item"  value="1">Litros</a></li>
                                    <li><a class="dropdown-item"  value="2">Kg</a></li>
                                    <li><a class="dropdown-item"  value="3">Centrimetros</a></li>

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
                            {{-- @foreach ($dimensions as $dimension) 
                                <li><a class="dropdown-item" id="dimension_id_drop" name="dimension_id_drop" href="#" value="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
                            @endforeach --}}
                            <li><a class="dropdown-item" href="#" value="1">Huetar Norte</a></li>
                            <li><a class="dropdown-item" href="#" value="2">Huetar Caribe</a></li>
                            <li><a class="dropdown-item" href="#" value="3">Huetar Norte y Caribe</a></li>
                            <li><a class="dropdown-item" href="#" value="4">Chorotega</a></li>
                            <li><a class="dropdown-item" href="#" value="5">Brunca</a></li>
                            <li><a class="dropdown-item" href="#" value="6">Nacional</a></li>
                        </ul>
                            <input type="hidden" id="region_id" name="region_id" value="none">
                        </div>

                    </div>

                    <div class="form-section">   
                        
                        <div class="btn-group btn-group-toggle" id="cuantitativo_form_toggle">
                            {{-- <label for="dropdownMenuButtonYear">Año: </label>
                            <div class="dropdown">
                                <button class="btn bg-gradient-warning dropdown-toggle" type="button" name="dropdownMenuButtonYear" id="dropdownMenuButtonYear" data-bs-toggle="dropdown" aria-expanded="false" text="Year">
                                Año
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonYear" id="dropdown-menu-year">
                                <li><a class="dropdown-item" href="#" value="1">2010</a></li>
                                <li><a class="dropdown-item" href="#" value="2">2011</a></li>
                                <li><a class="dropdown-item" href="#" value="3">2012</a></li>
                                <li><a class="dropdown-item" href="#" value="4">2013</a></li>
                                <li><a class="dropdown-item" href="#" value="5">2014</a></li>
                                <li><a class="dropdown-item" href="#" value="6">2015</a></li>
                                <li><a class="dropdown-item" href="#" value="1">2016</a></li>
                                <li><a class="dropdown-item" href="#" value="2">2017</a></li>
                                <li><a class="dropdown-item" href="#" value="3">2018</a></li>
                                <li><a class="dropdown-item" href="#" value="4">2019</a></li>
                                <li><a class="dropdown-item" href="#" value="5">2020</a></li>
                                <li><a class="dropdown-item" href="#" value="6">2021</a></li>
                                <li><a class="dropdown-item" href="#" value="6">2022</a></li>
                                </ul>
                                    <input type="hidden" id="year_id" name="year_id" value="none">
                            </div> --}}
                            <h5>2010</h5>
                            <label for="reference_name">Referencia</label>
                            <input type="text" name="dato_2010" class="form-control" placeholder="Dato" aria-label="reference_name" required>    
                        </div>
                       {{-- @if ($type == 'cuantitativo') --}}
                       <label for="reference_name">Referencia</label>
                       <input type="text" name="reference_name" class="form-control" placeholder="Referencia" aria-label="reference_name" required>             
                       {{-- @else

                       @endif --}}
                    </div>

                    <div class="fomr-section">
                        <label for="reference_name">Dato</label>
                        <input type="text" name="reference_name" class="form-control" placeholder="Referencia" aria-label="reference_name" required>     
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
        //alert('Variable id: '+variable_id_value+', variable nombre: '+$(element).attr('variable_nombre'));    
        $('#dropdownMenuButtonVariable').text($(element).attr('variable_nombre')); //Setea el nombre en el texto del boton
        $("#variable_id").val(variable_id_value); //Setea el valor en el input hidden
        $("#sub_variable_id").val('none');
        $('#dropdownMenuButtonSub').text('SELECCIONE LA SUB-VARIABLE'); //Setea el nombre en el texto del boton de variable

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
                // _token:'{!! csrf_token() !!}'

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
        alert('Subvariable id: '+sub_variable_id_value+', subvariable nombre: '+$(element).attr('sub_variable_nombre'));    
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
</script>

<script type="text/javascript">
//Script para checkbox de tipo de variable
    $(document).ready(function(){
        $('#variable-type input').on('change', function() {
            $('#variable_type_id').val($('input[name=\'options\']:checked', '#variable-type').val());
            $selected = $('#variable_type_id').val();
            // if($selected == '1'){
            //     $('.measurement_toggle').attr('hidden', false);
            // }else{
            //     $('.measurement_toggle').attr('hidden', true);
            // }
        });
    });
    
</script>
@endsection