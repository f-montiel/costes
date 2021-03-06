@extends('layouts.app')

@section('content')

<h1>Editar Producto</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('product.update', $product->id)}}" method="POST">
	{{ CSRF_field() }}
	{{ method_field('PUT') }}
	
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{$product->name}}" required="name">
	</div>
	<div class="form-group">
		<input type="submit" value="Actualizar" class="btn btn-primary float-right">
		<a href="{{ route('product.index') }}" class="btn btn-primary float-left">Volver</a>
	</div>
</form>

@stop