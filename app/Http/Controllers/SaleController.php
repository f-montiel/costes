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
}
