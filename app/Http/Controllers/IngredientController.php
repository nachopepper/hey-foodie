<?php

namespace App\Http\Controllers;

use App\Http\Requests\ingredient\StoreIngredient;
use App\Http\Requests\ingredient\UpdateIngredient;
use App\Models\Ingredient;
use Exception;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredient $request)
    {
        try {
            $name = $request->name;
            $price = $request->price;

            $ingredient = Ingredient::updateOrCreate(['name' => $name], ['price' => $price]);

            return response()->json([
                'ok' => true,
                'message' => 'Ingrediente almacenado con éxito',
                'ingredient' => $ingredient
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);

            return response()->json([
                'ok' => true,
                'ingredient' => $ingredient
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngredient $request, $id)
    {
        try {
            $name = $request->name;
            $price = $request->price;

            $ingredient = Ingredient::findOrFail($id)
                ->when($name, function ($query) use ($name) {
                    $query->update(['name' => $name]);
                })->when($price, function ($query) use ($price) {
                    $query->update(['price' => $price]);
                });

            return response()->json([
                'ok' => true,
                'message' => 'Ingrediente actualizado con éxito',
                'ingredient' => $ingredient->first()
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id)->delete();

            return response()->json([
                'ok' => true,
                'message' => 'Ingrediente eliminado con éxito',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
