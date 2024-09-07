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
        Schema::create('ordenes_cupones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes')->onDelete('cascade');
            $table->foreignId('cupon_id')->constrained('cupones')->onDelete('cascade');
            $table->decimal('descuento_aplicado', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_cupones');
    }
};
