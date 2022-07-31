<?php

namespace Database\Seeders;

use App\Models\Witch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WitchSeeder extends Seeder
{
    private $witches = ['Elly Kedward', 'Alice Kyteler', 'Madame Blavatsky', 'Joan Wytte'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->witches as $witch) {
            $potion = Witch::updateOrCreate(['name' => $witch]);
        }
    }
}
