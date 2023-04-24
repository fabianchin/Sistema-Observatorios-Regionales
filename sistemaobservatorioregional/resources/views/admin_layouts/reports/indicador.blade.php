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
        <form role="form text-left" method="post" action="{{ route('variable.insert') }}">
            @csrf
            <h1>Generación de Reportes</h1>
            <label for="dropdownMenuButton">Indicador</label>
            <div class="dropdown">
                <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dropdownMenuButton" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" text="Indicador">
                    Selecciona el Indicador
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu-indicator">
                    @foreach ($indicators as $indicator) 
                        <li><a class="dropdown-item" id="indicator_id_drop" name="indicator_id_drop" href="#" value="{{ $indicator->indicator_id }}">{{ $indicator->indicator_name }}</a></li>
                    @endforeach
                </ul>
                <input type="hidden" id="variable_dimension_id" name="variable_dimension_id" value="{{ $dimensionID }}">
                <input type="hidden" id="variable_Variable_id" name="variable_Variable_id" value="{{ $variableId }}">
                <input type="hidden" id="subVariable_Variable_id" name="subVariable_Variable_id" value="{{ $subVariableId }}">
                <input type="hidden" id="indicator_Variable_id" name="indicator_Variable_id" value="">
            </div>

            <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Generar Reporte</a></button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        //Cambiar el valor del boton dropdown
        $(".dropdown-toggle").next(".dropdown-menu").children().on("click", function () {
            $(this).closest(".dropdown-menu").prev(".dropdown-toggle").text($(this).text()); //Boton
        });

        //Agarrar el dato del dropdown y asignarlo al input hidden
        $(document).ready(function () {
            $("#dropdown-menu-indicator li a").click(function () {
                indicator_id_value = $(this).attr('value');
                indicator_name_value = $(this).text();
                $("#indicator_Variable_id").val(indicator_id_value);
            });
        });

        $(document).ready(function () {
            $("#dropdown-menu-indicator li a").click(function () {
                indicator_id_value = $(this).attr('value');
                indicator_name_value = $(this).text();
                $("#indicator_Variable_id").val(indicator_id_value);

                // Habilitar los botones cuando se selecciona un indicador
                $('button[type="submit"]').prop('disabled', false);
            });

            // Deshabilitar los botones por defecto
            $('button[type="submit"]').prop('disabled', true);
        });
    </script>
@endsection