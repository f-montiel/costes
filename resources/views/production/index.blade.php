@extends('layouts.templates.master')

@section('content')

<h3>Partidas</h3>
<a href="{{route('production.create')}}" class="btn btn-primary">Agregar</a>
<table class="table">
	<thead>
		<tr>
			<th>Partida</th>
			<th>Variedad</th>
			<th>Cantidad</th>
			<th>Costo Unitario</th>
			<th>Costo total</th>
			<th>Vencimiento</th>
		</tr>
	</thead>
	<tbody>
			@foreach($productionsWithUnitCost as $production)
				<tr>
					<td>	
						<a href="{{ route('production.show', $production->id) }}">{{$production->name}}</a>
					</td>
					<td>
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $production->quantity }}</p>
					</td>
					<td>
						<p>{{ $production->unitCost }}</p>
					</td>
					<td>
						<p>{{ $production->cost }}</p>
					</td>
					<td>
						<p>{{ $production->expiration }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop