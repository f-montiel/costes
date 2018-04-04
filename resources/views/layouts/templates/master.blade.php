<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <title>Costes</title>
    </head>
    <body>
      <div class="container-fluid">
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h3 class="my-0 mr-md-auto font-weight-normal">Sistema de Costeo Gastronomico</h3>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="{{ route('production.index') }}">Produccion</a>
          <a class="p-2 text-dark" href="{{ route('product.index') }}">Producto</a>
          <a class="p-2 text-dark" href="{{ route('measurement.index') }}">Unidad de Medida</a>
          <a class="p-2 text-dark" href="{{ route('ingredient.index') }}">Ingredientes</a>
          <a class="p-2 text-dark" href="{{ route('recipe.index') }}">Receta</a>
          <a class="p-2 text-dark" href="{{ route('client.index') }}">clientes</a>
          <a class="p-2 text-dark" href="{{ route('sale.index') }}">ventas</a>
          <a class="p-2 text-dark" href="{{ route('movement.index') }}">Stock</a>
        </nav>
        <!-- <a class="p-2 text-dark" href="#">Nombre de Usuario</a> -->
      </div>
          @yield('content')
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
