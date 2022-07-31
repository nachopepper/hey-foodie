<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Exception;
use Illuminate\Http\Request;

class SellController extends Controller
{

    public function store(Request $request)
    {
        try {
            $potionId = $request->potionId;
            $witchId = $request->witchId;
            $quantity = $request->quantity;

            $sell = Sell::updateOrCreate(
                [
                    'potion_id' => $potionId,
                    'witch_id' => $witchId
                ],
                [
                    'quantity' => $quantity
                ]
            );

            return response()->json([
                'ok' => true,
                'message' => 'Venta creada con éxito',
                'sell' => $sell
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }


    public function show($id)
    {
        try {

            $sell = Sell::findOrFail($id)->with('potion', 'witch')->get();

            return response()->json([
                'ok' => true,
                'sell' => $sell
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
