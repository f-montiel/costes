@extends('layouts.app')


@section('content')

<h1>Stock Por Partida</h1>

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
			@foreach($productions as $production)
			<?php if ($production->movement->sum('quantity') > 0): ?>
				<tr>
					<td>
						<p>{{ $production->name }}</p>
					</td>
					<td>
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $production->movement->sum('quantity') }}</p>
					</td>
					<td>
						<p>{{ $production->expiration->format('d/m/Y') }}</p>
					</td>
				</tr>
			<?php endif ?>
			@endforeach
	</tbody>
</table>	

@stop