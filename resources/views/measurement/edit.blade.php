@extends('layouts.app')

@section('content')

<h1>Editar Unidad de Medida</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('measurement.update', $measurement->id)}}" method="POST">
	{{csrf_field()}}
	{{ method_field('PUT') }}
	

	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" value="{{ $measurement->name }}" required="name">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary float-right" value="Actualizar">
		<a href="{{route('measurement.index')}}" class="btn btn-primary">Volver</a>
	</div>
</form>

@stop