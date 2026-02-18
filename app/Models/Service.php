<?php

namespace App\Models;

use App\Enums\PriceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'subcategory_id',
        'segment_id',
        'base_price',
        'price_type',
        'requires_measurements',
        'requires_deposit',
        'deposit_percentage',
        'duration_minutes',
        'available_days',
        'available_hours',
        'max_advance_booking_days',
        'image_path',
        'is_active',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'price_type' => PriceType::class,
            'base_price' => 'decimal:2',
            'deposit_percentage' => 'decimal:2',
            'requires_measurements' => 'boolean',
            'requires_deposit' => 'boolean',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'available_days' => 'array',
            'available_hours' => 'array',
        ];
    }

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function segment(): BelongsTo
    {
        return $this->belongsTo(Segment::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_services')
            ->withPivot('is_included', 'additional_price', 'is_recommended');
    }

    // ==========================================
    // SCOPES
    // ==========================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
