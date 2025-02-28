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
        Schema::create('barcos', function (Blueprint $table) {
            $table->id(); // PK autoincremental
            $table->string('nombre');
            $table->string('clase');
            $table->string('nacionalidad');
            $table->text('descripcion');
            $table->string('imagen')->nullable(); // Permite valores nulos
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcos');
    }
};
