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
        Schema::create('opciones_platos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plato_id')->constrained('platos')->onDelete('cascade');
            $table->string('nombre');
            $table->decimal('precio_adicional', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opciones_platos');
    }
};
