@extends('layouts.app')

@section('content')

<h1>Ingredientes</h1>

<div class="form-group">
	<a href="{{route('ingredient.create')}}" class="btn btn-primary">Agregar</a>
</div>

<h3>Listado de Ingredientes</h3>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Unidad de Medida</th>
			<th>Precio</th>
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
						{{$ingredient->measurement->name}}
					</td>
					<td>
						{{$ingredient->price}}
					</td>
					<td>
						<a href="{{ route('ingredient.edit', $ingredient->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>
@stop