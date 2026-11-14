<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Enums\ReservationStatus;
class Reservation extends Model
{
    use HasFactory;

     protected $fillable = [
        'start_date_time',
        'user_id',
        'status',
        'size',
        'reserved_at',
        'notes',
        'is_inside'
     ];

     protected $casts = [
        'is_inside' => 'boolean',
        'start_date_time' => 'datetime',
        'reserved_at' => 'datetime',
        'status' => ReservationStatus::class
    ];

    // The customer who made the reservation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Orders placed during this reservation
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
