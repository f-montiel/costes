@extends('layouts.templates.master')

@section('content')

<div class="container">
	<h3>{{ $product->name }}</h3>
	<div class="jumbotron">
		aqui van a ir las variedades
	</div>
	<div>
		<a href="{{ route('product.index') }}" class="btn btn-info">Volver</a>
	</div>
</div>
@stop