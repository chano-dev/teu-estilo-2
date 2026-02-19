<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_from',
        'currency_to',
        'rate',
        'margin_percentage',
        'is_active',
        'effective_from',
    ];

    protected function casts(): array
    {
        return [
            'rate' => 'decimal:4',
            'margin_percentage' => 'decimal:2',
            'is_active' => 'boolean',
            'effective_from' => 'datetime',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Taxa final com margem aplicada.
     */
    public function getFinalRateAttribute(): float
    {
        return round($this->rate * (1 + $this->margin_percentage / 100), 4);
    }

    /**
     * Converter valor de moeda estrangeira para Kwanza.
     */
    public function convert(float $amount): float
    {
        return round($amount * $this->final_rate, 2);
    }
}