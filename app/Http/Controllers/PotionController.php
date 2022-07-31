<?php

namespace App\Http\Controllers;

use App\Http\Requests\potion\StorePotion;
use App\Models\Potion;
use Exception;

class PotionController extends Controller
{

    public function store(StorePotion $request)
    {
        try {
            $name = $request->name;

            $potion = Potion::updateOrCreate(['name' => $name]);

            return response()->json([
                'ok' => true,
                'message' => 'Poción creada con éxito',
                'potion' => $potion
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function show($id)
    {
        try {

            $potion = Potion::findOrFail($id)->with('ingredients')->get();

            return response()->json([
                'ok' => true,
                'potion' => $potion,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
