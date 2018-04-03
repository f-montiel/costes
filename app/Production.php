<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
	protected $fillable = [
        'date',
        'name',
        'recipe_id',
        'quantity',
        'expiration',
        'cost',
        'recipe_ingredients'
    ];

    protected $dates = [
        'date',
        'expiration'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function movement()
    {
        return $this->hasMany('App\Movement');
    } 

    static function productionCost($recipe)
    {
        $ingredientsCost = $recipe->ingredientsCost($recipe->ingredients);

        $cost = $ingredientsCost->sum('cost');

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
