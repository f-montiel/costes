@extends('layouts.app')

@section('content')
<h1>Unidad de Medida</h1>

<h3>Detalle</h3>

<table class="table">
	<tr>
		<th>Nombre</th>
	</tr>
	<tr>
		<td>
			{{ $measurement->name }}
		</td>
	</tr>
</table>

<div class="form-group">
	<a href="{{ route('measurement.index') }}" class="btn btn-primary float-left">Volver</a>

	<form action="{{route('measurement.destroy', $measurement->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop