<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'variation_id',
        'quantity',
        'unit_price',
        'discount_percentage',
        'subtotal',
        'needs_confirmation',
        'confirmed_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'unit_price' => 'decimal:2',
            'discount_percentage' => 'decimal:2',
            'subtotal' => 'decimal:2',
            'needs_confirmation' => 'boolean',
            'confirmed_at' => 'datetime',
        ];
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class, 'variation_id');
    }
}