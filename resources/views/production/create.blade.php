@extends('layouts.templates.master')

@section('content')

<h3>Produccion</h3>
<form action="{{route('production.store')}}" method="POST">
	{{csrf_field()}}
	<div class="form-group">
		<label for="date">Fecha de Produccion</label>
		<input type="date" name="date"	class="form-control" value="<?php echo date("Y-m-d"); ?>">
	</div>
	<div class="form-group">
		<label for="name">Partida</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label for="product">Receta</label>
		<select class="form-control" name="recipe">
				<option value=""></option>
			@foreach($recipes as $recipe)
					<option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="name">Cantidad</label>
		<input type="number" name="quantity" class="form-control">
	</div>
	<div class="form-group">
		<label for="expiration">Vencimiento</label>
		<input type="date" name="expiration" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-info float-right" value="Guardar">
		<a href="{{route('production.index')}}" class="btn btn-info">Volver</a>
	</div>
</form>

@stop