<?php

namespace Database\Seeders;

use App\Models\Potion;
use App\Models\Sell;
use App\Models\Witch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($open = fopen(storage_path() . '/ventas.csv', 'r')) !== false) {
            while (($data = fgetcsv($open)) !== false) {
                $witchId = Witch::where('name', $data[0])->first()->id;
                $potionId = Potion::where('name', $data[1])->first()->id;
                $quantity = $data[2];
                $date = $data[3];
                Sell::updateOrCreate(['potion_id' => $potionId, 'witch_id' => $witchId, 'quantity' => $quantity, 'created_at' => $date]);
            }
            fclose($open);
        }
    }
}
