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
        Schema::create('verkopen', function (Blueprint $table) {
            $table->id('verkoop_id');
            $table->dateTime('datum_tijd');
            $table->foreignId('organisatie_id')->constrained('organisaties', 'organisatie_id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verkopen');
    }
};
