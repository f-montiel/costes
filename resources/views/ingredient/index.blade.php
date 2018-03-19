@extends('layouts.templates.master')

@section('content')

<h3>Ingredintes</h3>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			@foreach($ingredients as $ingredient)
				<tr>
					<td>
						<a href="{{ route('ingredient.show', $ingredient->id) }}">{{$ingredient->name}}</a>
					</td>
					<td>
						<a href="{{ route('ingredient.edit', $ingredient->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>
<footer>
	<a href="{{route('ingredient.create')}}" class="btn btn-primary">Agregar</a>
</footer>

@stop