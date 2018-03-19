@extends('layouts.templates.master')

@section('content')

<h3>Agregar Ingrediente</h3>
<form action="{{route('ingredient.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
	<div class="jumbotron">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control">		
		</div>
		<div class="form-group">
			<label for="price">Precio</label>
			<input type="number" name="price" class="form-control">		
		</div>
		<label for="measurement">Unidad de Medida</label>
		<select class="form-control" name="measurement_id">
			@foreach($measurements as $measurement)
					<option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('measurement.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop