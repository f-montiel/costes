@extends('layouts.templates.master')

@section('content')
<h1>Receta: {{ $recipe->name }}</h1>
<h3>Ingredientes para {{ $recipe->quantity }} {{ $recipe->name }};</h3>
<a href="{{ route('ingredientrecipe.create', $recipe->id) }}" class="btn btn-info">Agregar Ingrediente</a>
</div>
<div>
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th></th>
			</tr>
		</thead>
		@foreach($recipe->ingredients as $ingredient)
		<tbody>
			<tr>
				<td>{{$ingredient->name}}</td>
				<td>{{$ingredient->pivot->quantity . ' ' . $ingredient->measurement->name}}</td>
				<td>
					<form action="{{ route('ingredientrecipe.destroy', $ingredient->pivot->id) }}" method="POST">
						{{ CSRF_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="Quitar" class="btn btn-danger">
					</form>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>
<div>
	<a href="{{ route('recipe.index') }}" class="btn btn-info float-left">Volver</a>

	<form action="{{route('recipe.destroy', $recipe->id)}}" method="POST">
		{{ CSRF_field() }}
		{{ method_field('DELETE') }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
	</form>
</div>

@stop