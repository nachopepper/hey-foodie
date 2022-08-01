<?php

namespace App\Console\Commands;

use Exception;
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
    protected $description = 'Crea las tablas y realiza las migraciones. Como condición, se debe tener el archivo .env configurado.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            Artisan::call('jwt:secret -f');
            Artisan::call('optimize');
            Artisan::call('migrate');
            $this->info("Migrando base de datos");
            Artisan::call('db:seed --class=IngredientSeeder');
            $this->info("IngredientSeeder");
            Artisan::call('db:seed --class=PotionSeeder');
            $this->info("PotionSeeder");
            Artisan::call('db:seed --class=WitchSeeder');
            $this->info("WitchSeeder");
            Artisan::call('db:seed --class=RecipeSeeder');
            $this->info("RecipeSeeder");
            Artisan::call('db:seed --class=SellSeeder');
            $this->info("SellSeeder");
        } catch (Exception $e) {
            $this->info("Error inesperado: " . $e->getMessage());
        }
    }
}
