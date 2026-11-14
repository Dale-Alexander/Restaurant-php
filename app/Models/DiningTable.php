<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiningTable extends Model
{
    protected $fillable = [
        'number',
        'capacity',
        'is_inside',
        'is_active'
    ];

    protected $casts = [
        'capacity' => 'integer',
        'is_inside' => 'boolean',
        'is_active' => 'boolean'
    ];

    // Orders served at this table
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Reservations assigned to this table
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
