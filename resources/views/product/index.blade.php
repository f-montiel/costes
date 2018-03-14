@extends('layouts.templates.master')

@section('content')
<div class="container">
<h3>Productos</h3>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody>
			@foreach($products as $product)
				<tr>
					<td><a href="{{route('product.edit', $product->id)}}">{{$product->name}}</a></td>
				</tr>
			@endforeach
	</tbody>
</table>
<footer>
	<a href="{{route('product.create')}}" class="btn btn-primary">Agergar</a>
</footer>
</div>


@stop