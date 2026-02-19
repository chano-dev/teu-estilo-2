<?php

namespace App\Models;

use App\Enums\CartStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'cart_token',
        'guest_name',
        'guest_email',
        'guest_phone',
        'user_address_id',
        'delivery_street',
        'delivery_number',
        'delivery_neighborhood',
        'delivery_city',
        'delivery_province',
        'delivery_landmark',
        'subtotal',
        'discount_amount',
        'delivery_fee',
        'total',
        'status',
        'customer_notes',
        'internal_notes',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => CartStatus::class,
            'subtotal' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'delivery_fee' => 'decimal:2',
            'total' => 'decimal:2',
            'expires_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Cart $cart) {
            if (empty($cart->cart_token)) {
                $cart->cart_token = Str::random(64);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userAddress(): BelongsTo
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function whatsappLogs(): HasMany
    {
        return $this->hasMany(CartWhatsappLog::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', CartStatus::Active);
    }

    /**
     * Recalcular totais a partir dos itens.
     */
    public function recalculateTotals(): void
    {
        $this->subtotal = $this->items->sum('subtotal');
        $this->total = $this->subtotal - $this->discount_amount + $this->delivery_fee;
        $this->save();
    }
}