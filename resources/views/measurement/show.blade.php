@extends('layouts.templates.master')

@section('content')
<h1>Unidad de Medida</h1>

<h3>{{ $measurement->name }}</h3>

<div>
	<a href="{{ route('measurement.index') }}" class="btn btn-info float-left">Volver</a>

	<form action="{{route('measurement.destroy', $measurement->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop