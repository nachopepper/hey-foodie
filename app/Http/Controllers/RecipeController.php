<?php

namespace App\Http\Controllers;

use App\Http\Requests\recipe\StoreRecipe;
use App\Models\Potion;
use App\Models\Recipe;
use Exception;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function store(StoreRecipe $request)
    {
        try {
            $potionId = $request->potionId;
            $ingredientId = $request->ingredientId;
            $quantity = $request->quantity;

            $recipe = Recipe::updateOrCreate(
                [
                    'potion_id' => $potionId,
                    'ingredient_id' => $ingredientId
                ],
                [
                    'quantity' => $quantity
                ]
            );

            return response()->json([
                'ok' => true,
                'message' => 'Receta creada con éxito',
                'ingredient' => $recipe
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
