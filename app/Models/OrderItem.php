<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'name_snapshot',
        'price_snapshot',
        'notes',
        'quantity',
        'menu_item_id',
        'order_id'
    ];

    // The order this line belongs to
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // The menu item that was ordered
    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class);
    }

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
