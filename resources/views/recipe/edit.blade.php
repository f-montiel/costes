@extends('layouts.app')

@section('content')

<h1>Editar Receta</h1>
<form action="{{route('recipe.update', $recipe->id)}}" method="POST">
	{{ CSRF_field() }}
	{{ method_field('PUT') }}

	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{$recipe->name}}">
	</div>
	<div class="form-group">
		<label for="quantity">Cantidad</label>
		<input type="number" class="form-control" name="quantity" value="{{$recipe->quantity}}">
	</div>
	<div class="form-group">
		<input type="submit" value="Actualizar" class="btn btn-primary float-right">
		<a href="{{ route('recipe.index') }}" class="btn btn-primary float-left">Volver</a>
	</div>
</form>


@stop