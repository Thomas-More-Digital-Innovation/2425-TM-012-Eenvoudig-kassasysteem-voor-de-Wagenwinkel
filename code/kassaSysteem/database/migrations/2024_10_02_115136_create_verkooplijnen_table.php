<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verkooplijnen', function (Blueprint $table) {
            $table->id('verkooplijn_id');
            /*$table->timestamps();*/
            $table->integer('hoeveelheid');
            $table->float('verkoopprijs');
            $table->foreignId('verkoop_id');
            $table->foreignId('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verkooplijnen');
    }
};
