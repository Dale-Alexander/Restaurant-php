<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // Each menu item belongs to one category (menu_items.category_id)
    public function category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }

    // A menu item can appear in many order lines
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
