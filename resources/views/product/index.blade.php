@extends('layouts.app')

@section('content')

<h1>Productos</h1>

<div class="form-group">
	<a href="{{route('product.create')}}" class="btn btn-primary">Agregar</a>
</div>

<h3>Listado de Productos</h3>

<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
			@foreach($products as $product)
				<tr>
					<td>
						<a href="{{ route('product.show', $product->id) }}">{{$product->name}}</a>
					</td>
					<td>
						<a href="{{ route('product.edit', $product->id) }}" class="float-right">Editar</a>
					</td>
				</tr>
			@endforeach
	</tbody>
</table>

@stop