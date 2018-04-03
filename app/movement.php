<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movement extends Model
{
	protected $dates = [
		'date'
	];

    protected $fillable = [
    	'date',
    	'production_id',
    	'quantity'
    ];

    public function production()
    {
        return $this->belongsTo('App\Production');
    } 
}
