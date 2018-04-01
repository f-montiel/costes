@extends('layouts.templates.master')

@section('content')

<h1>{{ $recipe->name }}</h1>

<form action="{{route('ingredientrecipe.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
	<div class="jumbotron form-group">
		<label for="ingredient">Ingredintes</label>
		<select class="form-control" name="ingredient" required="ingredient">
					<option value=""></option>
			@foreach($ingredients as $ingredient)
					<option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
			@endforeach
		</select>
		<label for="quantity">Cantidad</label>
		<input type="number" name="quantity" class="form-control">
		<input type="hidden" name="recipeid" value="{{ $recipe->id }}">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop