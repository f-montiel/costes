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
    (function (){
        
        let recipes = [];
        
        $.get("/highchart", function(response){
        
        let sales = JSON.parse(response);

        for (var i = sales.length - 1; i >= 0; i--) {
            // recipes.push({
            //     recipe: movements[i].production.recipe.name,
            //     quantity: movements[i].production.quantity});
        }
        
        console.log(sales);
        });


        $(function () { 
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
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
        });
    })();
</script>

@stop