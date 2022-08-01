<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    private $ingredients = [
        [
            'name' => 'petalos',
            'price' => '2000'
        ],
        [
            'name' => 'sal de mar',
            'price' => '3000'
        ],
        [
            'name' => 'vino',
            'price' => '6000'
        ],
        [
            'name' => 'polvo magico',
            'price' => '30000'
        ],
        [
            'name' => 'Cenizas',
            'price' => '2500'
        ],
        [
            'name' => 'Aloe Vera',
            'price' => '1500'
        ],
        [
            'name' => 'Lagrima de Gato',
            'price' => '9000'
        ],
        [
            'name' => 'jugo magico',
            'price' => '27000'
        ],
        [
            'name' => 'Sanguijuelas',
            'price' => '13000'
        ],
        [
            'name' => 'Polvo de cuerno de bicornio',
            'price' => '65000'
        ],
        [
            'name' => 'sal de mar',
            'price' => '3000'
        ],
        [
            'name' => 'Cenizas',
            'price' => '2500'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->ingredients as $ingredient) {
            Ingredient::updateOrCreate(['name' => $ingredient['name'], 'price' => $ingredient['price']]);
        }
    }
}
