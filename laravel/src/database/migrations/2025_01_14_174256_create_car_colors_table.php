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
        Schema::create('car_colors', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('car_id')->constrained()->onDelete('restrict');
            $table->foreignId('color_id')->constrained()->onDelete('restrict');
            $table->unique(['car_id', 'color_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_colors');
    }
};
