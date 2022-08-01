<?php

namespace App\Http\Controllers;

use App\Models\Witch;
use Exception;
use Illuminate\Http\Request;

class WitchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function store(Request $request)
    {
        try {
            $name = $request->name;

            $witch = Witch::firstOrCreate(['name' => $name]);

            return response()->json([
                'ok' => true,
                'witch' => $witch
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
