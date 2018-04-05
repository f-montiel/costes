@extends('layouts.templates.master')


@section('content')

<h2>Stock Por Partida</h2>

</table>
<table class="table">
	<thead>
		<tr>
			<th>Partida</th>
			<th>Variedad</th>
			<th>Cantidad</th>
			<th>Vencimiento</th>
		</tr>
	</thead>
	<tbody>
			@foreach($movements as $movement)
				<tr>
					<td>
						<p>{{ $movement->production->name }}</p>
					</td>
					<td>
						<p>{{ $movement->production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $movement->quantity }}</p>
					</td>
					<td>
						<p>{{ $movement->production->expiration->format('d/m/Y') }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>	

@stop