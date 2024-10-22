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
        Schema::create('producten', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('naam');
            $table->float('actuele_prijs')->nullable();
            $table->string('afbeeldingen')->nullable();
            $table->foreignId('organisatie_id')->constrained('organisaties', 'organisatie_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categorie_id')->constrained('categories', 'categorie_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('standaard_id')->nullable()->constrained('standaard_producten', 'standaard_id')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('positie');
            $table->integer('voorraad')->nullable();
            $table->boolean('voorraadAanvullen');
            $table->boolean('visible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producten');
    }
};
