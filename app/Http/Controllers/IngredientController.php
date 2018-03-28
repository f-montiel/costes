<?php

namespace App\Http\Controllers;
use App\Measurement;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::with('measurement')
                                 ->orderBy('name')
                                 ->get();

        return view('ingredient.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measurements = Measurement::orderBy('name')
                                    ->get();

        return view('ingredient.create', compact('measurements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ingredient::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'measurement_id' => $request['measurement_id']
        ]);

        return redirect()->route('ingredient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = Ingredient::find($id);
        $measurement = Measurement::find($ingredient->measurement_id); 

        return view('ingredient.show', compact(['ingredient', 'measurement']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);

        return view('ingredient.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->input('name', 'Sin Nombre');
        $ingredient->price = $request->input('price', 'Sin Precio');
        $ingredient->save();

        return redirect()->route('ingredient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::destroy($id);

        return redirect()->route('ingredient.index');
    }
}
