<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'cost_price',
        'commission_percentage',
        'is_preferred',
        'lead_time_days',
        'min_order_quantity',
        'is_active',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'cost_price' => 'decimal:2',
            'commission_percentage' => 'decimal:2',
            'is_preferred' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePreferred($query)
    {
        return $query->where('is_preferred', true);
    }
}