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
  <div class="form-group">
    <label for="dimension-dropdown">Dimensión</label>
    <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="dimension-dropdown" id="dimension-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Selecciona la dimensión
        </button>
        <ul class="dropdown-menu" aria-labelledby="dimension-dropdown" id="dimension-dropdown-menu">
            @foreach ($dimensions as $dimension) 
            <li><a class="dropdown-item dimension-dropdown-item" href="#" data-dimension-id="{{$dimension->dimension_id}}">{{$dimension->dimension_name}}</a></li>
            @endforeach
        </ul>
        <input type="hidden" id="selected-dimension" name="selected_dimension" value="">
    </div>
</div>
<div class="form-group">
    <label for="variable-dropdown">Variable</label>
    <div class="dropdown">
        <button class="btn bg-gradient-info dropdown-toggle" type="button" name="variable-dropdown" id="variable-dropdown" data-bs-toggle="dropdown" aria-expanded="false" disabled>
            Selecciona la variable
        </button>
        <ul class="dropdown-menu" aria-labelledby="variable-dropdown" id="variable-dropdown-menu" disabled>
            <!-- opciones de variables de la dimensión seleccionada se agregan aquí mediante JavaScript -->
        </ul>
        <input type="hidden" id="selected-variable" name="selected_variable" value="">
    </div>
</div>
@endsection
<script>
    $('.dimension-dropdown-item').click(function() {
        var dimension_id = $(this).data('dimension-id');
        var dimension_name = $(this).text();
        $('#selected-dimension').val(dimension_id);
        $('#dimension-dropdown').text(dimension_name);
        $('#variable-dropdown').prop('disabled', true);
        $('#variable-dropdown-menu').empty();
        $.ajax({
            url: '/obtener_variables',
            type: 'POST',
            data: { dimension_id: dimension_id, _token: '{{ csrf_token() }}' },
            success: function(variables) {
                var $variable_dropdown_menu = $('#variable-dropdown-menu');
                $variable_dropdown_menu.empty();
                $.each(variables, function(index, variable) {
                    $variable_dropdown_menu.append($('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').data('variable-id', variable.variable_id).text(variable.variable_name)));
                });
                $('#variable-dropdown').prop('disabled', false);
            }
        });
    });
    $(document).on('click', '.dropdown-item', function() {
        var $this = $(this);
        var variable_id = $this.data('variable-id');
        var variable_name = $this.text();
        $('#selected-variable').val(variable_id);
        $('#variable-dropdown').text(variable_name);
    });
    function actualizarTextoDropdown(dropdownId, texto) {
        $('#' + dropdownId).text(texto);
    }

    $('.dimension-dropdown-item').click(function() {
        // código anterior
        actualizarTextoDropdown('dimension-dropdown', dimension_name);
        $('#variable-dropdown').prop('disabled', true);
        $('#variable-dropdown-menu').empty();
        $.ajax({
            // código anterior
        });
    });

    $(document).on('click', '.dimension-dropdown-item', function() {
        // código anterior
        actualizarTextoDropdown('variable-dropdown', variable_name);
    });
    
</script>
