@extends('layouts.templates.master')

@section('content')

<h3>Agregar Receta</h3>
<form action="{{route('recipe.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
	<div class="form-group">
		<label for="product">Producto</label>
		<select class="form-control" name="product">
			@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label for="name">Cantidad</label>
		<input type="number" name="quantity" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('recipe.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop
