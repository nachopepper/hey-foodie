<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class HeyFoodie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heyFoodie:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('jwt:secret');
        Artisan::call('migrate');
        $this->info("Migrando base de datos");
        Artisan::call('db:seed --class=IngredientSeeder');
        $this->info("IngredientSeeder");
        Artisan::call('db:seed --class=PotionSeeder');
        $this->info("PotionSeeder");
        Artisan::call('db:seed --class=WitchSeeder');
        $this->info("WitchSeeder");

    }
}
