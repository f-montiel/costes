@extends('layouts.templates.master')

@section('content')

<h3>Editar Unidad de Medida</h3>
<form action="{{route('measurement.update', $measurement->id)}}" method="POST">
	{{csrf_field()}}
	{{ method_field('PUT') }}
	
	<div class="jumbotron form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" value="{{ $measurement->name }}">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Actualizar">
		<a href="{{route('measurement.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop