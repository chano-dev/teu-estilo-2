<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductService extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'service_id',
        'is_included',
        'additional_price',
        'discount_percentage',
        'is_required',
        'is_recommended',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'additional_price' => 'decimal:2',
            'discount_percentage' => 'decimal:2',
            'is_included' => 'boolean',
            'is_required' => 'boolean',
            'is_recommended' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}