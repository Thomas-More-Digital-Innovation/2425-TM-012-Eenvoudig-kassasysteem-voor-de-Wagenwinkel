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
            $table->boolean('actiesMetSpraak')->default(false);
            $table->boolean('kleurenBlind')->default(false);
            $table->boolean('voorraadAangeven')->default(false);
            $table->boolean('wisselgeldAangeven')->default(false);
            $table->boolean('trillenBijActies')->default(false);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
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
