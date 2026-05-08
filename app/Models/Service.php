<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'price',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image 
            ? asset('storage/' . $this->image)
            : asset('img/home_promo.jpg');
    }

    public function getFormattedPriceAttribute(): stream_set_blocking{
        return number_format($this->price, 0, ',', ' ') . ' ₽';
    }
}
