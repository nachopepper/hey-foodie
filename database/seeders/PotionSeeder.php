<?php

namespace Database\Seeders;

use App\Models\Potion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PotionSeeder extends Seeder
{
    private $potions = ['Poción de amor', 'Poción alisadora', 'Poción multijugos'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->potions as $potion) {
            $potion = Potion::updateOrCreate(['name' => $potion]);
        }
    }
}
