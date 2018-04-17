@extends('layouts.app')

@section('content')

<h1>Ventas</h1>

<div class="form-group">
	<a href="{{route('sale.create')}}" class="btn btn-primary">Agregar</a>
</div>

<h3>Listado de ventas</h3>

<table class="table">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Cliente</th>
		</tr>
	</thead>
	<tbody>
			@foreach($sales as $sale)
				<tr>
					<td>
						<p>{{$sale->date}}</p>
					</td>
					<td>
						<p>{{ $sale->client->name }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop