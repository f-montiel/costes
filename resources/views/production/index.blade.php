@extends('layouts.templates.master')

@section('content')

<h3>Filtros</h3>

<form action="{{ route('production.index') }}" method="GET">
	<div class="row">
		<label for="recipe_id" class="col-3">Recetas</label>
		<label for="dateFrom" class="col-3">Fecha Desde</label>
		<label for="dateTo" class="col-3">Fecha Hasta</label>
	</div>
	<div class="form-group">
		<div class="row container-fluid">
			<select class="form-control col-3" name="recipe_id">
				<option value="">Todas</option>
				@foreach($recipes as $recipe)
					<option value="{{ $recipe->id }}" <?php if ($recipeFilterId == $recipe->id): ?>
						selected
					<?php endif ?>>{{ $recipe->name }}</option>
				@endforeach
			</select>
			<input type="date" name="dateFrom" class="form-control col-3">
			<input type="date" name="dateTo" class="form-control col-3">
		</div>
		<div class="row container-fluid">
			<input type="submit" class="btn btn-primary float-right" value="Filtrar">
		</div>
	</div>
</form>

<div class="row container-fluid">
<h3 class="col-11">Partidas</h3>

	<a href="{{route('production.create')}}" class="btn btn-primary col-1">Agregar</a>
</div>

<table class="table">
	<thead>
		<tr>
			<th>Partida</th>
			<th>Fecha de Produccion</th>
			<th>Variedad</th>
			<th>Cantidad</th>
			<th>Costo Unitario</th>
			<th>Costo total</th>
			<th>Vencimiento</th>
		</tr>
	</thead>
	<tbody>
			@foreach($productionsWithUnitCost as $production)
				<tr>
					<td>	
						<a href="{{ route('production.show', $production->id) }}">{{$production->name}}</a>
					</td>
					<td>
						<p>{{ $production->date }}</p>
					</td>
					<td>
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $production->quantity }}</p>
					</td>
					<td>
						<p>{{ $production->unitCost }}</p>
					</td>
					<td>
						<p>{{ $production->cost }}</p>
					</td>
					<td>
						<p>{{ $production->expiration }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop