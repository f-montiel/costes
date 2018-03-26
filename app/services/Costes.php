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

		if (!isset($subtotal)) {
			$subtotal = 0;
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
		if (!isset($subtotal)) {
			$subtotal = array(0);
		}
		$total = array_sum($subtotal);

		return $total;
	}

	public static function unitCost($id)
	{
		$production = Production::find($id);
		$unitcost = $production->cost / $production->quantity;
		//en el caso de que la receta no tenag ingredientes, $production->cost / $production->quantity = 0/0
		//deberia validar esto para que no surga algun error? Esta funcionando bien.

		return $unitcost;
	}
}


?>