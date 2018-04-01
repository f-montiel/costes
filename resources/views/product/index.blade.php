@extends('layouts.templates.master')

@section('content')

<h3>Productos</h3>
<a href="{{route('product.create')}}" class="btn btn-primary">Agregar</a>
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