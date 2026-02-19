<?php

namespace App\Models;

use App\Enums\InquiryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'name',
        'phone',
        'email',
        'message',
        'image_path',
        'image_path_2',
        'budget',
        'shein_links',
        'shein_total_usd',
        'estimated_total_aoa',
        'status',
        'admin_notes',
        'whatsapp_sent',
        'contacted_at',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => InquiryStatus::class,
            'budget' => 'decimal:2',
            'shein_total_usd' => 'decimal:2',
            'estimated_total_aoa' => 'decimal:2',
            'whatsapp_sent' => 'boolean',
            'contacted_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', InquiryStatus::Pending);
    }

    public function scopeForService($query, int $serviceId)
    {
        return $query->where('service_id', $serviceId);
    }
}