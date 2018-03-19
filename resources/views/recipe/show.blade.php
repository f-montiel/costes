@extends('layouts.templates.master')

@section('content')
<h1>Receta: {{ $recipe->name }}</h1>

<h3>Ingredientes para {{ $recipe->quantity }} {{ $recipe->name }};</h3>
<div class="jumbotron">
	Aca van a ir los ingredientes
</div>
<div>
	<a href="{{ route('recipe.index') }}" class="btn btn-info float-left">Volver</a>

	<form action="{{route('recipe.destroy', $recipe->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop