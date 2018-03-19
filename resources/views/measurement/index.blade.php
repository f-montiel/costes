@extends('layouts.templates.master')

@section('content')

<h3>Unidades de Medida</h3>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			@foreach($measurements as $measurement)
				<tr>
					<td>
						<a href="{{ route('measurement.show', $measurement->id) }}">{{$measurement->name}}</a>
					</td>
					<td>
						<a href="{{ route('measurement.edit', $measurement->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>
<footer>
	<a href="{{route('measurement.create')}}" class="btn btn-primary">Agregar</a>
</footer>

@stop