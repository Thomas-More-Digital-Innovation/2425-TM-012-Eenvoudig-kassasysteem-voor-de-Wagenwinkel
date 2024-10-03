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
        Schema::create('wisselgelden', function (Blueprint $table) {
            $table->id('wisselgeld_id');
            $table->date('datum');
            $table->integer('hoeveelheid');
            $table->foreignId('organisatie_id');
            $table->foreignId('muntstuk_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisselgelden');
    }
};
