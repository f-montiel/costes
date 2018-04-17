@extends('layouts.app')

@section('content')
<h1>{{ $ingredient->name }}</h1>

<h3>Detalle</h3>

<table class="table">
	<thead>
		<tr>
			<th>
				Unidad de Medida
			</th>
			<th>
				Precio
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				{{ $measurement->name }}
			</td>
			<td>
				${{ $ingredient->price }}
			</td>
		</tr>
	</tbody>
</table>
<form action="{{route('ingredient.destroy', $ingredient->id)}}" method="POST">
	{{ CSRF_field() }}

	<input type="submit" class="btn btn-danger float-right" value="Borra">
		
	{{ method_field('DELETE') }}
</form>

<div>
	<a href="{{ route('ingredient.index') }}" class="btn btn-primary float-left">Volver</a>

</div>

@stop