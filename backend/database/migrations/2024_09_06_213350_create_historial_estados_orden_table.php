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
        Schema::create('historial_estados_orden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('estados_orden')->onDelete('cascade');
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_estados_orden');
    }
};
