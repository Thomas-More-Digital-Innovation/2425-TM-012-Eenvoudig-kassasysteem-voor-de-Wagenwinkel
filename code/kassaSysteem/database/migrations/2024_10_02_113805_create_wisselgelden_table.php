<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new git pullnclass extends Migration
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
            $table->foreignId('organisatie_id')->constrained('organisaties', 'organisatie_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('muntstuk_id')->constrained('muntstukken', 'muntstuk_id')->onDelete('cascade')->onUpdate('cascade');
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
