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
        'cost'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
