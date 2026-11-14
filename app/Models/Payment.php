<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Enums\PaymentMethod;
use App\Models\Enums\PaymentStatus;

class Payment extends Model
{
    protected $fillable = [
        'payment_method',
        'amount',
        'order_id',
        'status',

    ];

    protected $casts = [
        'payment_method' => PaymentMethod::class,
        'status' => PaymentStatus::class
    ];

    // The order this payment is for
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
