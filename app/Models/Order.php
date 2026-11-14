<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Enums\OrderStatus;

class Order extends Model
{
    protected $fillable = [
        'served_by',
        'status',
        'closed_at',
        'total',
        'subtotal',
        'tax',
        'tip',
        'discount',
        'reservation_id',
        'user_id'
    ];
    protected $casts = [
        'closed_at' => 'datetime',
        'status' => OrderStatus::class
    ];

    // The customer who placed the order (nullable for walk-ins)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // The reservation this order came from (nullable for walk-ins)
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    // The lines (dishes) on this order
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // An order can be paid in several payments (e.g. split bill)
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
