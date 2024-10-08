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
        Schema::create('organisaties', function (Blueprint $table) {
            $table->id('organisatie_id');
            $table->string('naam');
            $table->boolean('actiesMetSpraak');
            $table->boolean('kleurenBlind');
            $table->boolean('voorraadAangeven');
            $table->boolean('wisselgeldAangeven');
            $table->boolean('trillenBijActies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisaties');
    }
};
