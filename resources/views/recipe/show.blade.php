@extends('layouts.app')

@section('content')
<h1>{{ $recipe->name }}</h1>

<div class="form-group">
<a href="{{ route('ingredientrecipe.create', $recipe->id) }}" class="btn btn-primary">Agregar Ingrediente</a>
</div>

<h3>Ingredientes para {{ $recipe->quantity }}</h3>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Costo</th>
			<th></th>
		</tr>
	</thead>
	@foreach($ingredients as $ingredient)
	<tbody>
		<tr>
			<td>{{ $ingredient->name }}</td>
			<td>{{ $ingredient->pivot->quantity . ' ' . $ingredient->measurement->name }}</td>
			<td>{{ $ingredient->price }}</td>
			<td>{{ $ingredient->cost }}</td>
			<td>
				<form action="{{ route('ingredientrecipe.destroy', $ingredient->pivot->id) }}" method="POST">
					{{ CSRF_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" value="Quitar" class="btn btn-link float-right">
				</form>
			</td>
		</tr>
	</tbody>
	@endforeach
</table>

<div>
	<a href="{{ route('recipe.index') }}" class="btn btn-primary float-left">Volver</a>

	<form action="{{route('recipe.destroy', $recipe->id)}}" method="POST">
		{{ CSRF_field() }}
		{{ method_field('DELETE') }}

		<input type="submit" class="btn btn-danger float-right" value="Borrar">
			
	</form>
</div>

@stop