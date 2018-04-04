<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'client_id',
    	'date'
    ];

    public function productions()
    {
    	return $this->belongsToMany('App\Production')->withPivot('id','quantity');
    }

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

    public function movements()
    {
        return $this->hasMany('App\sale');
    }
}
