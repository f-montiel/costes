@extends('layouts.templates.master')

@section('content')

<h3>Agregar Unidad de Medida</h3>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('measurement.store')}}" method="POST">
{{csrf_field()}}
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" required="name">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('measurement.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop