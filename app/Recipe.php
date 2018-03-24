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
        return $this->belongsToMany('App\Ingredient')->withPivot('quantity');
    }
}
