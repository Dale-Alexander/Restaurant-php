<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = [
        'name',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];
    /* 
        public function up(): void
    {
        Schema::create('menu_categories', function(Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

    }
    */
}
