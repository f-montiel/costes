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
        <nav>
          <ul class="nav navbar">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('production.index') }}">Produccion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('measurement.index') }}">Unidades de Medida</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('product.index')}}">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('recipe.index') }}">Recetas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link float-right" href="{{ route('ingredient.index') }}">Ingredientes</a>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          @yield('content')
        </div>
    </body>
</html>
