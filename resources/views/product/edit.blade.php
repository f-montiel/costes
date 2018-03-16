@extends('layouts.templates.master')

@section('content')
<div class="container">
	<h3>Editar Producto</h3>
</div>
<form action="{{route('product.update', $product->id)}}" method="POST">
	{{ CSRF_field() }}
	<div class="container jumbotron">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" class="form-control" name="name" value="{{$product->name}}">
		</div>
	</div>
	<div class="container">
		<input type="submit" value="Actualizar" class="btn btn-info float-right">
		<a href="{{ route('product.index') }}" class="btn btn-info float-left">Volver</a>
	</div>
	{{ method_field('PUT') }}
</form>

<form action="{{route('product.destroy', $product->id)}}" method="POST">
	{{ CSRF_field() }}

	<input type="submit" class="btn btn-danger float-right" value="Borra">
		
	{{ method_field('DELETE') }}
</form>

@stop