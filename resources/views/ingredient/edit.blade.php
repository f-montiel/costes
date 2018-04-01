@extends('layouts.templates.master')

@section('content')

<h3>Editar Ingrediente</h3>
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach
<form action="{{route('ingredient.update', $ingredient->id)}}" method="POST">
	{{csrf_field()}}
	{{ method_field('PUT') }}

	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required="name">		
	</div>
	<div class="form-group">
		<label for="price">Precio</label>
		<input type="number" name="price" class="form-control" value="{{ $ingredient->price }}" required="price">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Actualizar">
		<a href="{{route('ingredient.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>
@stop