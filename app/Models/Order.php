<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
