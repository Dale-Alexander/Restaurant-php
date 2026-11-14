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
        'is_inside'
     ];

     protected $casts = [
        'is_inside' => 'boolean',
        'start_date_time' => 'datetime',
        'reserved_at' => 'datetime',
        'status' => ReservationStatus::class
    ];

}
