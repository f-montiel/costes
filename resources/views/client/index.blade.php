@extends('layouts.templates.master')

@section('content')

<h1>Clientes</h1>

<a href="{{ route('client.create') }}" class="btn btn-primary">Agregar</a>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody>
			@foreach($clients as $client)
				<tr>
					<td>	
						<a href="{{ route('client.show', $client->id) }}">{{$client->name}}</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>




@stop