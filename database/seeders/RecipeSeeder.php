<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Potion;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $love = Potion::where('name', 'Poción de amor')->first()->id;
        $ali = Potion::where('name', 'Poción alisadora')->first()->id;
        $multi = Potion::where('name', 'Poción multijugos')->first()->id;

        $petalos = Ingredient::where('name', 'petalos')->first()->id;
        $sal = Ingredient::where('name', 'sal de mar')->first()->id;
        $wine = Ingredient::where('name', 'vino')->first()->id;
        $magic = Ingredient::where('name', 'polvo magico')->first()->id;
        $ashes = Ingredient::where('name', 'Cenizas')->first()->id;
        $aloe = Ingredient::where('name', 'Aloe Vera')->first()->id;
        $cat = Ingredient::where('name', 'Lagrima de Gato')->first()->id;
        $juice = Ingredient::where('name', 'jugo magico')->first()->id;
        $sang = Ingredient::where('name', 'Sanguijuelas')->first()->id;
        $bicorn = Ingredient::where('name', 'Polvo de cuerno de bicornio')->first()->id;

        $data = [
            ['potion_id' => $love, 'ingredient_id' => $petalos, 'quantity' => 0.2],
            ['potion_id' => $love, 'ingredient_id' => $sal, 'quantity' => 0.1],
            ['potion_id' => $love, 'ingredient_id' => $wine, 'quantity' => 0.4],
            ['potion_id' => $love, 'ingredient_id' => $magic, 'quantity' => 0.3],

            ['potion_id' => $ali, 'ingredient_id' => $ashes, 'quantity' => 0.3],
            ['potion_id' => $ali, 'ingredient_id' => $aloe, 'quantity' => 0.3],
            ['potion_id' => $ali, 'ingredient_id' => $cat, 'quantity' => 0.1],
            ['potion_id' => $ali, 'ingredient_id' => $juice, 'quantity' => 0.3],
            
            ['potion_id' => $multi, 'ingredient_id' => $sang, 'quantity' => 0.2],
            ['potion_id' => $multi, 'ingredient_id' => $bicorn, 'quantity' => 0.1],
            ['potion_id' => $multi, 'ingredient_id' => $cat, 'quantity' => 0.3],
            ['potion_id' => $multi, 'ingredient_id' => $juice, 'quantity' => 0.2],
            ['potion_id' => $multi, 'ingredient_id' => $sal, 'quantity' => 0.1],
            ['potion_id' => $multi, 'ingredient_id' => $ashes, 'quantity' => 0.1],
        ];

        foreach ($data as $recipe) {
            Recipe::updateOrCreate(['potion_id' => $recipe['potion_id'], 'ingredient_id' => $recipe['ingredient_id'], 'quantity' => $recipe['quantity']]);
        }
    }
}
