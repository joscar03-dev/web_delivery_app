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
        Schema::table('carrito_items', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['plato_id']);

            // Renombrar la columna plato_id a producto_id
            $table->renameColumn('plato_id', 'producto_id');

            // Agregar la nueva clave foránea
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrito_items', function (Blueprint $table) {
            // Eliminar la clave foránea de producto_id
            $table->dropForeign(['producto_id']);

            // Renombrar la columna producto_id a plato_id
            $table->renameColumn('producto_id', 'plato_id');

            // Restaurar la clave foránea original
            $table->foreign('plato_id')->references('id')->on('productos');
        });
    }
};
