<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'sku_variation',
        'barcode_variation',
        'price_adjustment',
        'stock_quantity',
        'stock_reserved',
        'image_path',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price_adjustment' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->whereColumn('stock_quantity', '>', 'stock_reserved');
    }

    /**
     * Stock disponível (total - reservado).
     */
    public function getStockAvailableAttribute(): int
    {
        return max(0, $this->stock_quantity - $this->stock_reserved);
    }

    /**
     * Preço final desta variação (preço base do produto + ajuste).
     */
    public function getFinalPriceAttribute(): float
    {
        return round($this->product->price_sell + $this->price_adjustment, 2);
    }
}