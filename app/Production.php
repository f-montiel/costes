<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
	protected $fillable = [
        'name',
        'recipe_id',
        'quantity',
        'expiration',
        'cost',
        'recipe_ingredients'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    static function productionCost($recipe)
    {
        $ingredientsCost = $recipe->ingredientsCost($recipe->ingredients);
        $cost = $ingredientsCost->sum('price');

        return $cost;
    }

    static function unitCost($productions)
    {
        foreach ($productions as $production) {
            $production->unitCost = $production->cost / $production->quantity;
        }

        return $productions;
    }
}
