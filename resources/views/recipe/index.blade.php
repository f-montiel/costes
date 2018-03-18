@extends('layouts.templates.master')

@section('content')

<h3>Recetas</h3>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
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
						<a href="{{ route('recipe.edit', $recipe->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>
<footer>
	<a href="{{route('recipe.create')}}" class="btn btn-primary">Agregar</a>
</footer>

@stop