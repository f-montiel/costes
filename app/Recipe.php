<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'product_id'
    ];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withPivot('id','quantity');
    }

    public function production()
    {
        return $this->hasMany('App\Production');
    }

    public function ingredientsCost($ingredients)
    {
        foreach ($ingredients as $ingredient) {
            $ingredient->cost = $ingredient->price * $ingredient->pivot->quantity;
            }
        return $ingredients;
    }
}
