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
        Schema::create('muntstukken', function (Blueprint $table) {
            $table->id('muntstuk_id');
            $table->string('naam');
            $table->float('waarde');
            $table->string('afbeelding');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muntstukken');
    }
};
