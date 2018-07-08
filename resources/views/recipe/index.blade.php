@extends('layouts.app')

@section('content')

<h1>Recetas</h1>

<div class="form-group">
	<a href="{{route('recipe.create')}}" class="btn btn-primary">Agregar</a>
</div>

<h3>Listado de Recetas</h3>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			@foreach($recipes as $recipe)
				<tr>
					<td>
						<a href="{{ route('recipe.show', $recipe->id) }}">{{$recipe->name}}</a>
					</td>
					<td>
						{{ $recipe->quantity }}
					</td>
					<td>
						<a href="{{ route('recipe.edit', $recipe->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop