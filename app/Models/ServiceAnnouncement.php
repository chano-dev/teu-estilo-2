<?php

namespace App\Models;

use App\Enums\AnnouncementStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'message',
        'status',
        'opens_at',
        'closes_at',
        'next_opening_at',
        'internal_limit',
        'internal_used',
        'internal_notes',
        'show_countdown',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'status' => AnnouncementStatus::class,
            'opens_at' => 'datetime',
            'closes_at' => 'datetime',
            'next_opening_at' => 'datetime',
            'internal_limit' => 'decimal:2',
            'internal_used' => 'decimal:2',
            'show_countdown' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', AnnouncementStatus::Open);
    }

    /**
     * Verifica se o carrinho está aberto agora.
     */
    public function getIsOpenNowAttribute(): bool
    {
        if ($this->status !== AnnouncementStatus::Open) {
            return false;
        }

        $now = now();

        if ($this->opens_at && $now->lt($this->opens_at)) {
            return false;
        }

        if ($this->closes_at && $now->gt($this->closes_at)) {
            return false;
        }

        return true;
    }

    /**
     * Limite interno restante (não expor ao público).
     */
    public function getInternalRemainingAttribute(): float
    {
        if (! $this->internal_limit) {
            return 0;
        }

        return max(0, $this->internal_limit - $this->internal_used);
    }
}