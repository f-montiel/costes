@extends('layouts.templates.master')

@section('content')
<div class="container">
<h3>Productos</h3>
<table class="table">
	<thead>
		<th>Nombre</th>
	</thead>
	@foreach($products as $product)
	<tbody>
		<td><a href="#">{{$product->name}}</a></td>
	</tbody>
	@endforeach
</table>
<footer>
	<a href="{{route('product.create')}}" class="btn btn-primary">Agergar</a>
</footer>
</div>


@stop