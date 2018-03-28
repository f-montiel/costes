@extends('layouts.templates.master')

@section('content')

<h3>Partida: {{ $production->name }}</h3>
<h4>Ingredientes</h4>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Costo</th>
		</tr>
	</thead>
	<tbody>
			@foreach($ingredients as $ingredient)
				<tr>
					<td>
						<p>{{ $ingredient->name }}</p>
					</td>
					<td>
						{{ $ingredient->pivot->quantity }}
					</td>
					<td>
						<p>{{ $ingredient->price }}</p>
					</td>
					<td>{{ $ingredient->cost }}</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop