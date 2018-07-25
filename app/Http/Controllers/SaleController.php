<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production;
use App\Sale;
use App\Client;
use App\Movement;
use App\Http\Requests\SaleStore;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with('client')->get();

        return view('sale.index', compact('sales'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productions = Production::with('recipe', 'movement')->get();
        $clients = Client::get();

        return view('sale.create', compact('productions', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStore $request)
    {
        $movements = Movement::get();
        $quantities = $request->input('quantity');

        foreach ($quantities as $productionId => $quantity) {
            if (!isset($quantity)) {
                return back();
            }
            if ($quantity > $movements->where('production_id', $productionId)->sum('quantity')) {
                return back();
            }
        }        

        $sale = Sale::create([
            'date' => $request->date,
            'client_id' => $request->client_id
        ]);

        foreach ($quantities as $productionId => $quantity) {
            if (isset($quantity)) {
                $sale->productions()->attach($productionId, ['quantity' => $quantity]);
                  Movement::create([
                    'date' => $request->date,
                    'production_id' => $productionId,
                    'quantity' => -$quantity,
                    'movement_type_id' => 2
                  ]);
            }
        }

          return redirect()->route('sale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function highchart()
    {
        /*
        1- Listado de todas las ventas
        2- Listado de los nombres de las recetas involucradas en las ventas, sin repetir.
        3- Listado, con un array adentro por cada cliente que haya comprado. Cada uno de estos arrays internos tiene:
        name (con el nombre del cliente) y data, que es un array.
        El array de data tiene que tener siempre la misma longitud para todos los clientes. 
        La CANTIDAD de valores del array 'data', es igual a la cantidad de recetas diferentes involucradas en alguna venta'

        El cliente 'A' compra 'x' unidades de la receta 'Poroto'. El cliente 'B' compra 'y' unidades de la receta 'Soja'.

        El array de recetas queda: ['Poroto', 'Soja']
        El segundo array tiene que quedar:
        
        $unitsByRecipeAndClient = [
            [
                'name' => 'A',
                'data' => [x, 0]
            ],
            [
                'name' => 'B',
                'data' => [0, y]
            ]
        ];
        */

        // 1
        $sales = Sale::with('productions.recipe', 'productions.movement', 'client')->get();

        // 2
        // Una venta puede hacer referencia a muchas partidas. Cada partida tiene una receta.
        // Armamos un listado de partidas, y extraemos los nombres de las recetas, sin repetir
        $productions = $sales->flatMap(function($item, $key) {
            return $item->productions;
        });

        $recipes = $productions->pluck('recipe')->unique(); // Por ahora es una collection con recipes, con id, name, etc.

        // 3
        // Empezando de afuera hacia adentro, el listado global del informe tiene un 'item' por cada cliente.
        // Hay que preparar un listado de clientes sin repetir, para hacer el loop.
        $clients = $sales->pluck('client')->unique()->flatten();

        // Creamos una collection vacia, donde vamos a poner todos los datos
        $unitsByRecipeAndClient = collect([]);

        // Foreach en clientes, para tener tantos items como clientes haya
        foreach ($clients as $client) {
            // Armamos la base del array del cliente

            $clientData = [
                'name' => $client->name,
                'data' => []
            ];

            // Separamos sus ventas
            $clientSales = $sales->where('client_id', $client->id);
            // Separamos las partidas de estas ventas
            $clientProductions = $clientSales->pluck('productions')->flatten();

            // Por cada cliente hay que armar el array 'data', que tiene que tener tantos valores como recetas diferentes haya
            // Hacer loop sobre el listado de recetas
            foreach ($recipes as $key => $recipe) {
                // Sumo las unidades vendidas de la receta de este loop
                // Esto sale de la pivot production_sale
                $totalForRecipeAndClient = $clientProductions->where('recipe_id', $recipe->id)->pluck('pivot')->flatten()->sum('quantity');

                $clientData['data'][$key] = $totalForRecipeAndClient;
            }

            $unitsByRecipeAndClient = $unitsByRecipeAndClient->push(collect($clientData));
        }

        $reportData = [
            'recipes' => $recipes->pluck('name'),
            'series' => $unitsByRecipeAndClient
        ];

        return response($reportData);
    }

    public function highchartMasLimpio() 
    {
        $sales = Sale::with('productions.recipe', 'productions.movement', 'client')->get();

        $productions = $sales->flatMap(function($item, $key) {
            return $item->productions;
        });

        $recipes = $sales->pluck('productions')->flatten()->pluck('recipe')->unique();
        $clients = $sales->pluck('client')->unique()->flatten();

        $unitsByRecipeAndClient = collect([]);

        foreach ($clients as $client) {
            $clientData = [
                'name' => $client->name,
                'data' => []
            ];

            $clientProductions = $sales->where('client_id', $client->id)->pluck('productions')->flatten();

            foreach ($recipes as $key => $recipe) {
                $clientData['data'][$key] = $clientProductions->where('recipe_id', $recipe->id)->pluck('pivot')->flatten()->sum('quantity');
            }

            $unitsByRecipeAndClient = $unitsByRecipeAndClient->push(collect($clientData));
        }

        $reportData = [
            'recipes' => $recipes->pluck('name'),
            'series' => $unitsByRecipeAndClient
        ];

        return response($reportData);
    }

    private function getUniqueRecipesFromSales($sales)
    {
        $productions = $sales->flatMap(function($item, $key) {
            return $item->productions;
        });

        return $productions->pluck('recipe')->unique();
    }
}
