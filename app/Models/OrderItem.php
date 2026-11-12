<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'name_snaphot',
        'price_snapshot',
        'notes',
        'quantity',
        'menu_item_id',
        'order_id'
    ];
    /*
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
    */
}
