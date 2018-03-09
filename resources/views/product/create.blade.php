@extends('layouts.templates.master')

@section('content')
<div class="container">
	<h3>Agregar Producto</h3>
	<form action="{{route('product.store')}}" method="POST">
		{{csrf_field()}}
		<div class="jumbotron">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control">		
		</div>
		<button class="btn btn-info">Guardar</button>
	</form>
</div>

@stop

