<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'production_id',
    	'sale_id',
    	'quantity'
    ];

    public function productions()
    {
    	return $this->belongsToMany('App\Production')->withPivot('id','quantity');
    }
}
