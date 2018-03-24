@extends('layouts.templates.master')

@section('content')

<h3>Partidas</h3>
<a href="{{route('production.create')}}" class="btn btn-primary">Agregar</a>
<table class="table">
	<thead>
		<tr>
			<th>Partida</th>
			<th>Cantidad</th>
			<th>Variedad</th>
			<th>Vencimiento</th>
			<th>Costo</th>
		</tr>
	</thead>
	<tbody>
			@foreach($productions as $production)
				<tr>
					<td>	
						<a href="{{ route('production.show', $production->id) }}">{{$production->name}}</a>
					</td>
					<td>
						<p>{{ $production->quantity }}</p>
					</td>
					<td>
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $production->expiration }}</p>
					</td>
					<td>
						<p>{{ $production->cost }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop