@extends('layouts.app')

@section('content')

@foreach($errors->all() as $error)
<div class="alert alert-danger">
  	<ul>
  		<li>
  		{{ $error }}
  		</li>
  	</ul>	
</div>

@endforeach

<div class="container">
	<form action="{{route('recipe.store')}}" method="POST">
    	<div class="row justify-content-center">
    		<div class="col-md-12">
	        	<div class="card form-group">
	                <div class="card-header">
						Agregar Receta
	                </div>
	        	    <div class="card-body">
						{{csrf_field()}}
						{{ method_field('POST') }}
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" class="form-control" required="name">
							<label for="product">Producto</label>
							<select class="form-control" name="product" required="product">
										<option value=""></option>
								@foreach($products as $product)
										<option value="{{ $product->id }}">{{ $product->name }}</option>
								@endforeach
							</select>
							<label for="quantity">Cantidad</label>
							<input type="number" name="quantity" class="form-control" required="quantity">
						    </div>
							<label for="product">Ingredientes</label>
							<select class="form-control" name="ingredient" id="selected" onchange="btn()">
								<option value=""></option>
								@foreach($ingredients as $ingredient)
									<option value="{{ $ingredient }}">{{ $ingredient->name }}</option>
								@endforeach
							</select>
							<label for="quantity">Cantidad</label>
							<input type="number" class="form-control" id="quantity" onchange="btn()">
						</div>
						<button 
							class="form-control btn btn-info" id="button" onclick="btnValidation()" disabled="">Agregar Ingrediente
						</button>
					</div>
	        	</div>
				<table id="table" class="table" hidden>
					<thead>
						<tr>
							<th>Ingrediente</th>
							<th>Cantidad</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="table-body">

					</tbody>
				</table>
    		</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary float-right" value="Guardar">
				<a href="{{route('recipe.index')}}" class="btn btn-primary">Volver</a>
			</div>
    	</div>
	</form>	
</div>

<script>

let ingredients = [];
let quantities = [];

function btn() {
	let selected = document.getElementById("selected").value;
    let quantity = document.getElementById("quantity").value;
    if (selected && quantity) {
    	btnEnable();
    }
    else {
    	btnDisable();
    }
}

function btnEnable() {
	let btn = document.getElementById("button");
	btn.removeAttribute("disabled");

}

function btnDisable() {
	let btn = document.getElementById("button");
	btn.setAttribute("disabled", "true");
}

function clean() {
	let selected = document.getElementById("selected");
    let quantity = document.getElementById("quantity");
    selected.value = "";
    quantity.value = "";
}

function btnValidation() {
	document.getElementById("button").addEventListener("click", function(event){
    event.preventDefault()
	});
	btn();
	let btnAttribute = document.getElementById("button").hasAttribute("disabled");
	if (!btnAttribute) {
		table();
	}

}

function table() {
	let table = document.getElementById("table");
	let hidden = table.hidden;

	if (hidden) {
		table.removeAttribute("hidden");
		requetsObjet();
	}
	else {
		requetsObjet();
	}
}

function requetsObjet() {
	let selected = document.getElementById("selected").value;
    let quantity = document.getElementById("quantity").value;
    ingredients.push(selected);
    quantities.push(quantity);
	body()
}

function body() {
	let rowQuantity = document.getElementById("table-body").rows.length
	let selected = document.getElementById("selected").value;
    let quantity = document.getElementById("quantity").value;
    let tableBody = document.getElementById("table-body");
    let row = tableBody.insertRow(rowQuantity);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    cell1.innerHTML = JSON.parse(selected).name;
    cell2.innerHTML = quantity;
    cell3.innerHTML = "<a href='#' onclick='deleteRow(this)'>Borrar</a>";
    clean();
    btn();
    console.log(ingredients);
}

function deleteRow(id) {
	let rowToDelete = id.parentNode.parentNode.rowIndex;
    document.getElementById("table").deleteRow(rowToDelete);
}

</script>

@stop
