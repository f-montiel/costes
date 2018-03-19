@extends('layouts.templates.master')

@section('content')

<h3>Editar Producto</h3>
<form action="{{route('product.update', $product->id)}}" method="POST">
	{{ CSRF_field() }}
	{{ method_field('PUT') }}
	
	<div class="jumbotron">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" class="form-control" name="name" value="{{$product->name}}">
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="Actualizar" class="btn btn-info float-right">
		<a href="{{ route('product.index') }}" class="btn btn-info float-left">Volver</a>
	</div>
</form>

@stop