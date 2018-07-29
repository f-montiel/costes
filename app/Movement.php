<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
	protected $dates = [
		'date'
	];

    protected $fillable = [
    	'date',
    	'production_id',
    	'quantity',
        'movement_type_id'
    ];

    public function production()
    {
        return $this->belongsTo('App\Production');
    } 

    // public function sale()
    // {
    //     return $this->belongsTo('App\Movement');
    // }
}
