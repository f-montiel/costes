@extends('layouts.templates.master')

@section('content')

<h1>Listado de Ventas</h1>

<a href="{{route('sale.create')}}" class="btn btn-primary">Agregar</a>

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