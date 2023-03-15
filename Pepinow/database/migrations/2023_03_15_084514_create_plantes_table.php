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
        Schema::create('plantes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_name');
            $table->string('family');
            $table->string('genus');
            $table->float('height');
            $table->string('origin');
            $table->integer('quantity');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantes');
    }
};
