<?php

namespace App\Http\Controllers;

use App\Production;
use App\Recipe;
use App\services\Costes;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = Production::with('recipe')->get();
        $productionsWithUnitCost = Production::unitCost($productions);

        return view('production.index', compact('productionsWithUnitCost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = Recipe::get();

        return view('production.create', compact('recipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::with('ingredients')->find($request['recipe']);
        Production::create([
            'name' => $request['name'],
            'recipe_id' => $request['recipe'],
            'quantity' => $request['quantity'],
            'expiration' => $request['expiration'],
            'cost' => Production::productionCost($recipe),
            'recipe_ingredients' => $recipe->ingredients->toJson()
        ]);

        return redirect()->route('production.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $production = Production::find($id);
        $recipeIngredients = json_decode($production->recipe_ingredients);
        $ingredients = Recipe::find($production->recipe_id)->ingredientsCost($recipeIngredients);

        return view('production.show', compact('production', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }
}
