<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'is_inside',
        'dining_table_id'
     ];

     protected $casts = [
        'is_inside' => 'boolean',
        'start_date_time' => 'datetime',
        'reserved_at' => 'datetime',
        'status' => ReservationStatus::class
    ];

<<<<<<< Updated upstream
=======
    // The customer who made the reservation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // The table assigned to this reservation (nullable until staff assign one)
    public function diningTable(): BelongsTo
    {
        return $this->belongsTo(DiningTable::class);
    }

    // Orders placed during this reservation
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
>>>>>>> Stashed changes
}
