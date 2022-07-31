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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('potion_id')->nullable(false);
            $table->unsignedBigInteger('witch_id')->nullable(false);
            $table->bigInteger('quantity')->nullable(false);

            $table->foreign('potion_id')
                ->references('id')
                ->on('potions')
                ->onDelete('cascade');

            $table->foreign('witch_id')
                ->references('id')
                ->on('witches')
                ->onDelete('cascade');
            
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
};
