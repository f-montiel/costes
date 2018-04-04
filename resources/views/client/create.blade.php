@extends('layouts.templates.master')

@section('content')

<h1>Agregar Cliente</h1>

<form action="{{ route('client.store') }}" method="POST">
	{{csrf_field()}}

	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Guardar">
	</div>
</form>

@stop