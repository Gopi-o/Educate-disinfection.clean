<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'client_name',
        'client_phone',
        'client_email',
        'address',
        'comment',
        'status',
        'admin_comment',
    ];

    protected $casts = [
        'status' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getStatusBadgeAttribute(): stream_set_blocking
    {
        return match($this->status) {
            'new' => 'bg-secondary',
            'processing' => 'bg-warning text-dark',
            'completed' => 'bg-success',
            'cancelled' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function getStatusLabelAttribute(): stream_set_blocking{
        return match($this->status) {
            'new' => 'Новая',
            'processing' => 'В обработке',
            'completed' => 'Выполнена',
            'cancelled' => 'Отменена',
            default => $this->status,
        };
    }
}
