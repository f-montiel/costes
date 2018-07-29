@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="container" style="width:100%; height:100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extrajs')

<script>
    //codigo viejo
    // (function (){
        
    //     let recipes = [];
        
    //     $.get("/highchart", function(response){
        
    //     let sales = JSON.parse(response);

    //     for (var i = sales.length - 1; i >= 0; i--) {
    //         // recipes.push({
    //         //     recipe: movements[i].production.recipe.name,
    //         //     quantity: movements[i].production.quantity});
    //     }
        
    //     console.log(sales);
    //     });


//(function (){ Esto es lo mismo que $(function(). Es como que estabas haciendo 2 veces on document ready

$(function () {
    $.get("/highchart", function(response){
        let categories = [];
        let series = [];

        // Primero creo el array vacio, para que si da error el request no quede undefined la variable recipes, 
        // y el chart lo siga tomando como un array vacio. Sino puede explotar todo y queda blanca la pantalla
        if(response.recipes != undefined) {
            categories = response.recipes
        }


        if(response.series != undefined) {
            series = response.series
        }

        buildChart(categories, series)
    });

    function buildChart(categories, series) {
        let myChart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            // Saca el comentario de abajo para que sea una barra por receta, de n colores
            // plotOptions: {
            //     series: {
            //         stacking: 'normal'
            //     }
            // },
            title: {
                text: 'Ventas por receta'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
<<<<<<< HEAD
                    text: 'Ventas por Cliente'
                },
                xAxis: {
                    categories: ['Apples', 'Bananas', 'Oranges']
                },
                yAxis: {
                    title: {
                        text: 'Cantidad Vendida'
                    }
                },
                series: [{
                    name: 'Jane',
                    data: [1, 3, 4]
                }, {
                    name: 'John',
                    data: [5, 7, 3]
                }]
            });
=======
                    text: 'Unidades'
                }
            },
            series: series
>>>>>>> c959df9bb27714aea1ce0758bc2baabf5fb8ad65
        });
    }

});

</script>

@stop