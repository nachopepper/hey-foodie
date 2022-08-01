<?php

namespace App\Http\Controllers;

use App\Http\Requests\sell\StoreSell;
use App\Models\Sell;
use Exception;

class SellController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(StoreSell $request)
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

            $sell = Sell::where('id', $id)->with('potion', 'witch')->get();

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

    // public function showAll()
    // {
    //     try {

    //         $sell = Sell::with('potion', 'witch')->get();

    //         return response()->json([
    //             'ok' => true,
    //             'sell' => $sell
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'ok' => false,
    //             'message' => $e->getMessage(),
    //         ], 400);
    //     }
    // }
}
