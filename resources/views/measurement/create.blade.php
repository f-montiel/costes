@extends('layouts.app')

@section('content')

<h1>Agregar Unidad de Medida</h1>

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>
@endforeach

<form action="{{route('measurement.store')}}" method="POST">
{{csrf_field()}}
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" name="name" class="form-control" required="name">		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary float-right" value="Guardar">
		<a href="{{route('measurement.index')}}" class="btn btn-primary">Volver</a>
	</div>
</form>

@stop