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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price', 6, 2);
            $table->timestamps();
            $table->boolean('is_active')->default(true);
            $table->string('imageUrl')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('category_id')->constrained('menu_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
