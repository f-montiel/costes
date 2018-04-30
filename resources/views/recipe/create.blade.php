@extends('layouts.app')

@section('content')

<h1>Agregar Receta</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('recipe.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
	<div class="form-group">
		<label for="product">Producto</label>
		<select class="form-control" name="product" required="product">
					<option value=""></option>
			@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" required="name">
	</div>
	<div class="form-group">
		<label for="quantity">Cantidad</label>
		<input type="number" name="quantity" class="form-control" required="quantity">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary float-right" value="Guardar">
		<a href="{{route('recipe.index')}}" class="btn btn-primary">Volver</a>
	</div>
</form>

@stop
