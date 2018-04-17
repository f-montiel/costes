@extends('layouts.app')

@section('content')


<h1>Clientes</h1>
<div class="form-group">
	<a href="{{ route('client.create') }}" class="btn btn-primary">Agregar</a>
</div>
<h3>Listado de Clientes</h3>
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