<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('potion_id')->nullable(false);
            $table->unsignedBigInteger('ingredient_id')->nullable(false);
            $table->float('quantity', 8, 2)->nullable(false);

            $table->foreign('potion_id')
                ->references('id')
                ->on('potions')
                ->onDelete('cascade');

            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
