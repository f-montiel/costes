<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Product;
use App\Ingredient;
use App\services\Costes;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeStore;
use App\Http\Requests\RecipeUpdate;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients')
                           ->orderby('name')
                           ->get();
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name')
                                  ->get();
        $ingredients = Ingredient::get();

        return view('recipe.create', compact('products', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeStore $request)
    {
        dd($request);
        Recipe::create([
          'name' => $request['name'],
          'quantity' => $request['quantity'],
          'product_id' => $request['product']
        ]);
       return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::with('ingredients')->find($id);
        $ingredients = $recipe->ingredientsCost($recipe->ingredients);
        
        return view('recipe.show', compact('recipe', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return view('recipe.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeUpdate $request, $id)
    {
        $recipe = Recipe::find($id);

        $recipe->name = $request->input('name', 'Sin Nombre');
        $recipe->quantity = $request->input('quantity', '1');
        $recipe->save();

        return redirect()->route('recipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Recipe::destroy($id);

       return redirect()->route('recipe.index');
    }
}
