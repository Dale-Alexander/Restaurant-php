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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_item_id')->constrained()->onDelete('restrict');
            //The above doesnt allow a menu_item to be deleted when it is referenced by a record in this table
            $table->integer('quanity');
            $table->string('name_snapshot');
            $table->decimal('price_snapshot', 6, 2);
            $table->string('notes')->nullable();
            //Snapshots are there so as to know the price and name of the product at the time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
