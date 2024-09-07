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
        Schema::create('carrito_item_opciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrito_item_id')->constrained('carrito_items')->onDelete('cascade');
            $table->foreignId('opcion_id')->constrained('opciones_platos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_item_opciones');
    }
};
