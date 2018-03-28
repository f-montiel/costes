@extends('layouts.templates.master')

@section('content')

<h3>Agregar Producto</h3>
<form action="{{route('product.store')}}" method="POST">
	{{csrf_field()}}
		
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('product.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop

