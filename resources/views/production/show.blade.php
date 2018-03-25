@extends('layouts.templates.master')

@section('content')
<h1>Partida</h1>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Costo Total</th>
			<th>Costo Unitario</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $production->name }}</td>
			<td>{{ $production->quantity }}</td>
			<td>{{ $cost }}</td>
			<td>{{ $unitcost }}</td>
		</tr>
	</tbody>
</table>
</div>
<div>
	<a href="{{ route('production.index') }}" class="btn btn-info float-left">Volver</a>

	<form action="{{route('production.destroy', $production->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop