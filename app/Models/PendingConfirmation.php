<?php

namespace App\Models;

use App\Enums\ConfirmationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendingConfirmation extends Model
{
    protected $fillable = [
        'cart_item_id',
        'supplier_id',
        'status',
        'requested_at',
        'responded_at',
        'response_notes',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => ConfirmationStatus::class,
            'requested_at' => 'datetime',
            'responded_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function cartItem(): BelongsTo
    {
        return $this->belongsTo(CartItem::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', ConfirmationStatus::Pending);
    }

    public function getIsExpiredAttribute(): bool
    {
        return $this->expires_at && now()->gt($this->expires_at);
    }
}
