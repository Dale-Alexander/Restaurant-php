<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name',
        'price',
        'is_active',
        'imageUrl',
        'description',
        'category_id'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
    
}
