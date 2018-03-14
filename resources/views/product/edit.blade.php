@extends('layouts.templates.master')

@section('content')
<div class="container">
	<h3>Editar Producto</h3>
</div>
<form action="{{route('product.update', $product->id)}}" method="POST">
	{{csrf_field()}}
	<div class="container jumbotron">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" class="form-control" name="name" value="{{$product->name}}">
		</div>
	</div>
	<div class="container">
		<input type="submit" value="Guardar" class="btn btn-info float-right">
	</div>
</form>

@stop