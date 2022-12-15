@extends('admin_layouts.admin_nav')

@section('crud_content')
<div class="card-body">
    <form role="form text-left" method="post" action="{{route('dimension.update')}}">
        @csrf
        <input type="hidden" name="dimension_id" value="{{$dimension->dimension_id}}">
        <div class="mb-3">
            <label for="dimension_name">Nombre de dimension</label>
            <input type="text" name="dimension_name" class="form-control" placeholder="Nombre de dimension" aria-label="dimension_name" required value="{{$dimension->dimension_name}}">
            <br>
            <label for="dimension_acronym">Acronimo</label>
            <input type="text" maxlength="2" onkeypress='return event.charCode >= 65'
                name="dimension_acronym" class="form-control" placeholder="Acronimo de la dimension" aria-label="dimension_acronym" required value="{{$dimension->dimension_acronym}}">
        </div>
        <div class="container text-center">
            <button type="submit" class="btn bg-gradient-success w-30 my-4 mb-2"><a style="color:white">Modificar</a></button>
            <button type="button" class="btn bg-gradient-danger w-30 my-4 mb-2"><a style="color:white" href={{route('dimension.manage')}}>Regresar</a></button>
        </div>
    </form>
  </div>
@endsection