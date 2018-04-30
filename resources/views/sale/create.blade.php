@extends('layouts.app')

@section('content')

<h1>Agregar venta</h1>

<form action="{{ route('sale.store') }}" method="POST">
	{{csrf_field()}}

	<div class="form-group">
		<label for="date">Fecha</label>
		<input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" required="date" >
	</div>
	<div class="form-group">
		<label for="client">Client</label>
		<select name="client_id" class="form-control" required="client_id">
			<option value=""></option>
			@foreach($clients as $client)
			<option value="{{ $client->id }}">{{ $client->name }}</option>
			@endforeach
		</select>
	<table class="table">
	<thead>
		<tr>
			<th>Receta</th>
			<th>Partida</th>
			<th>Vencimiento</th>
			<th>Stock</th>
			<th>Venta</th>
		</tr>
	</thead>
	<tbody>
			@foreach($productions as $production)
			<?php if ($production->movement->sum('quantity') > 0): ?>
				<tr>
					<td>	
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>	
						<p>{{ $production->name }}</p>
					</td>
					<td>	
						<p>{{ $production->expiration->format('d/m/Y') }}</p>
					</td>
					<td>	
						<p>{{ $production->movement->sum('quantity') }}</p>
					</td>
					<td>
						<input type="number" name="quantity[{{$production->id}}]" class="form-control">
					</td>
				</tr>
			<?php endif ?>
			@endforeach
	</tbody>
</table>
	<div class="form-group">
		<input type="submit" value="Guardar" class="btn btn-primary float-right" >
	</div>
</form>
	<div class="form-group">
		<a href="{{ route('sale.index') }}" class="btn btn-primary">Volver</a>
	</div>

@stop