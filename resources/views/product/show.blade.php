@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>

<h3>Recetas</h3>
<div>
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			@foreach($product->recipes as $recipe)
			<tr>
				<td>{{ $recipe->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div>
	<a href="{{ route('product.index') }}" class="btn btn-primary float-left">Volver</a>

	<form action="{{route('product.destroy', $product->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borrar">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop