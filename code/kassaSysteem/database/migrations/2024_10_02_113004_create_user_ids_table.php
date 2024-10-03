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
        Schema::create('user_ids', function (Blueprint $table) {
            $table->id('user_id');
            /*$table->timestamps();*/
            $table->string('naam');
            $table->integer('password');
            $table->foreignId('rol_id');
            $table->foreignId('organisatie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ids');
    }
};
