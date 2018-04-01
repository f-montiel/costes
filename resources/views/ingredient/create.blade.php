@extends('layouts.templates.master')

@section('content')

<h3>Agregar Ingrediente</h3>
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach
<form action="{{route('ingredient.store')}}" method="POST">
	{{csrf_field()}}
	{{ method_field('POST') }}
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" required="name">		
		</div>
		<div class="form-group">
			<label for="price">Precio</label>
			<input type="decimal" name="price" class="form-control" required="price">		
		</div>
		<div class="form-group">
		<label for="measurement">Unidad de Medida</label>
		<select class="form-control" name="measurement_id" required="measurement_id">
			<option value=""></option>
			@foreach($measurements as $measurement)
					<option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
			@endforeach
		</select>
		</div>
		<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('ingredient.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop