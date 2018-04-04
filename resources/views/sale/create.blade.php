@extends('layouts.templates.master')

@section('content')

<h1>Agregar venta</h1>

<form action="{{ route('sale.store') }}" method="POST">
	{{csrf_field()}}

	<div class="form-group">
		<label for="date">Fecha</label>
		<input type="date" class="form-control" name="date">
	</div>
	<div class="form-group">
		<label for="client">Client</label>
		<select name="client_id" class="form-control">
			<option value=""></option>
			@foreach($clients as $client)
			<option value="{{ $client->id }}">{{ $client->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		@foreach($productions as $production)
		<label for="production">{{ $production->recipe->name . ' ' . $production->name . ' ' . $production->expiration->format('d/m/Y') . 'Cantidad disponible: ' . $production->quantity }}</label>
		<input type="number" name="quantity[{{$production->id}}]" value="{{ $production->quantity }}" class="form-control">
		@endforeach
	</div>
	<div class="form-group">
		<input type="submit" value="Guardar" class="btn btn-primary">
	</div>
</form>

@stop