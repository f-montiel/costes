@extends('layouts.app')

@section('content')

<h1>Agregar Ingrediente</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('ingredientrecipe.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
	<div class="form-group">
		<label for="ingredient">Ingredintes</label>
		<select class="form-control" name="ingredient" required="ingredient">
					<option value=""></option>
			@foreach($ingredients as $ingredient)
					<option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
			@endforeach
		</select>
		<label for="quantity">Cantidad</label>
		<input type="number" name="quantity" class="form-control" required="quantity">
		<input type="hidden" name="recipeid" value="{{ $recipe->id }}">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary float-right" value="Guardar">
		<a href="{{route('recipe.show', $recipe->id)}}" class="btn btn-primary">Volver</a>
	</div>
</form>

@stop