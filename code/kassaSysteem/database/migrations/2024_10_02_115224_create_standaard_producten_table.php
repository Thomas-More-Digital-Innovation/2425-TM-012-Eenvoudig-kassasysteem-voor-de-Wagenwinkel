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
        Schema::create('standaard_producten', function (Blueprint $table) {
            $table->id('standaard_id');
            $table->string('naam');
            $table->string('afbeelding');
            $table->float('standaardprijs');
            $table->unsignedBigInteger('categorie_id');

            $table->foreign('categorie_id')->references('categorie_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standaard_producten');
    }
};
