@extends('layouts.app')

@section('content')
<h1>Lote Produccion</h1>

<div class="form-group">
	<a href="{{route('production.create')}}" class="btn btn-primary">Agregar</a>
</div>

<h3>Filtros</h3>

<form action="{{ route('production.index') }}" method="GET">
	<div class="row">
		<label for="recipe_id" class="col-3">Recetas</label>
		<label for="dateFrom" class="col-3">Fecha de Produccion Desde</label>
		<label for="dateTo" class="col-3">Fecha de Produccion Hasta</label>
	</div>
	<div class="form-group">
		<div class="row container-fluid">
			<select class="form-control col-3" name="recipeId">
				<option value="">Todas</option>
				@foreach($recipes as $recipe)
					<option value="{{ $recipe->id }}" <?php if ($recipeId == $recipe->id): ?>
						selected
					<?php endif ?>>{{ $recipe->name }}</option>
				@endforeach
			</select>
			<input type="date" name="dateFrom" class="form-control col-3" <?php if (isset($dateFrom)): ?>
				value = "{{ $dateFrom }}"				
			<?php endif ?>>
			<input type="date" name="dateTo" class="form-control col-3" <?php if (isset($dateTo)): ?>
				value = "{{ $dateTo }}"				
			<?php endif ?>>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Filtrar">
	</div>
</form>

<h3>Listado de Partidas</h3>

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
						<p>{{ $production->date->format('d/m/Y') }}</p>
					</td>
					<td>
						<p>{{ $production->recipe->name }}</p>
					</td>
					<td>
						<p>{{ $production->quantity }}</p>
					</td>
					<td>
						<p>${{ round($production->unitCost, 2) }}</p>
					</td>
					<td>
						<p>${{ round($production->cost, 2) }}</p>
					</td>
					<td>
						<p>{{ $production->expiration->format('d/m/Y') }}</p>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

{{ $productionsWithUnitCost->appends(['recipeId' => $recipeId, 'dateFrom' => $dateFrom, 'dateTo' => $dateTo])->links() }}

@stop