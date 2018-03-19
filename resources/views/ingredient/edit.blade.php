@extends('layouts.templates.master')

@section('content')

<h3>Editar Ingrediente</h3>
<form action="{{route('ingredient.update', $ingredient->id)}}" method="POST">
	{{csrf_field()}}
	{{ method_field('PUT') }}

	<div class="jumbotron">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" value="{{ $ingredient->name }}">		
		</div>
		<div class="form-group">
			<label for="price">Precio</label>
			<input type="number" name="price" class="form-control" value="{{ $ingredient->price }}">		
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Actualizar">
		<a href="{{route('measurement.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>
@stop