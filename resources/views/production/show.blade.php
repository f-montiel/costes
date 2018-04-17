@extends('layouts.app')

@section('content')

<h1>{{ $production->name }}</h1>
<h2>Cantidad producida: {{ $production->quantity }}</h2>
<h3>Detalle</h3>

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
						<p>${{ $ingredient->price }}</p>
					</td>
					<td>${{ $ingredient->cost }}</td>
				</tr>
			@endforeach
	</tbody>
</table>

<a href="{{ route('production.index') }}" class="btn btn-primary float-left">Volver</a>

@stop