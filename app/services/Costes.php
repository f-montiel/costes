<?php 
namespace App\services;

use App\Recipe;
use App\Production;

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

	public static function unitCost($id)
	{
		$production = Production::find($id);
		$unitcost = $production->cost / $production->quantity;

		return $unitcost;
	}
}


?>