<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
    	'name',
    	'price',
    	'measurement_id'
    ];

	public function measurement()
    {
        return $this->belongsTo('App\Measurement');
    }
	public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->withPivot('quantity');
    }

}
