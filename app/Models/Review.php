<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'author_name',
        'rating',
        'text',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getStarsAttribute(): string
    {
        $full = str_repeat('<i class="bi bi-star-fill"></i>', $this->rating);
        $empty = str_repeat('<i class="bi bi-star"></i>', 5 - $this->rating);
        return $full . $empty;
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-warning text-dark',
            'approved' => 'bg-success',
            'rejected' => 'bg-danger',
            default => 'bg-secondary'
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'На модерации',
            'approved' => 'Одобрен',
            'rejected' => 'Отклонен',
            default => $this->status,
        };
    }
}
