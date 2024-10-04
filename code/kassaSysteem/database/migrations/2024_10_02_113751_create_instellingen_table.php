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
        Schema::create('instellingen', function (Blueprint $table) {
            $table->id('instelling_id');
            $table->string('instelling');
            $table->boolean('status')->default(false);
            $table->foreignId('organisatie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instellingen');
    }
};