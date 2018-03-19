@extends('layouts.templates.master')

@section('content')
<h1>Ingrediente</h1>

<h3>{{ $ingredient->name }} ${{ $ingredient->price }}/{{ $measurement->name }}</h3>

<div>
	<a href="{{ route('ingredient.index') }}" class="btn btn-info float-left">Volver</a>

	<form action="{{route('ingredient.destroy', $ingredient->id)}}" method="POST">
		{{ CSRF_field() }}

		<input type="submit" class="btn btn-danger float-right" value="Borra">
			
		{{ method_field('DELETE') }}
	</form>
</div>

@stop