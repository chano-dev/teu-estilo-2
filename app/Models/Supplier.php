<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'slug',
        'tax_id',
        'sku_code',
        'email',
        'phone',
        'whatsapp',
        'address',
        'city',
        'province',
        'country',
        'payment_terms',
        'bank_name',
        'bank_account',
        'is_consignment',
        'commission_percentage',
        'rating',
        'is_active',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'is_consignment' => 'boolean',
            'is_active' => 'boolean',
            'commission_percentage' => 'decimal:2',
            'rating' => 'decimal:2',
        ];
    }

    /**
     * Produtos deste fornecedor (via pivot product_suppliers).
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_suppliers')
                    ->withPivot('cost_price', 'commission_percentage', 'is_primary')
                    ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Apenas fornecedores de consignação.
     */
    public function scopeConsignment($query)
    {
        return $query->where('is_consignment', true);
    }

    /**
     * Apenas stock próprio (Teu Estilo).
     */
    public function scopeOwn($query)
    {
        return $query->where('is_consignment', false);
    }

    /**
     * Verifica se é fornecedor de consignação.
     */
    public function isConsignment(): bool
    {
        return $this->is_consignment;
    }

    /**
     * Verifica se é stock próprio.
     */
    public function isOwnStock(): bool
    {
        return ! $this->is_consignment;
    }
}