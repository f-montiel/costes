<?php 
namespace App\services;

use App\Recipe;

class Costes
{
	public static function subtotal($id)
	{
		$recipe = Recipe::with('ingredients')->find($id);
		foreach ($recipe->ingredients as $ingredient) {
			$calculo = $ingredient->price * $ingredient->pivot->quantity;
			$subtotal[$ingredient->id] = $calculo;
		}
		return $subtotal;
	}
	public static function total($id)
	{
		$recipe = Recipe::with('ingredients')->find($id);
		foreach ($recipe->ingredients as $ingredient) {
			$calculo = $ingredient->price * $ingredient->pivot->quantity;
			$subtotal[$ingredient->id] = $calculo;
		}
		$total = array_sum($subtotal);
		return $total;
	}
}


?>