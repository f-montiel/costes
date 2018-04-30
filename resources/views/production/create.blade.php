@extends('layouts.app')

@section('content')

<h1>Agregar Partida</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('production.store')}}" method="POST">
	{{csrf_field()}}
	<div class="form-group">
		<label for="date">Fecha de Produccion</label>
		<input type="date" name="date"	class="form-control" required="date" value="<?php echo date("Y-m-d"); ?>" >
	</div>
	<div class="form-group">
		<label for="name">Partida</label>
		<input type="text" name="name" class="form-control" required="name">
	</div>
	<div class="form-group">
		<label for="product">Receta</label>
		<select class="form-control" name="recipe" required="product">
				<option value=""></option>
			@foreach($recipes as $recipe)
					<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="name">Cantidad</label>
		<input type="number" name="quantity" class="form-control" required="quanity">
	</div>
	<div class="form-group">
		<label for="expiration">Vencimiento</label>
		<input type="date" name="expiration" class="form-control" required="expiration">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary float-right" value="Guardar">
		<a href="{{route('production.index')}}" class="btn btn-primary">Volver</a>
	</div>
</form>

@stop