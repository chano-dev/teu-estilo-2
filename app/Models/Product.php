<?php

namespace App\Models;

use App\Enums\ProductCondition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'barcode',
        'name',
        'slug',
        'description',
        'short_description',
        'subcategory_id',
        'brand_id',
        'collection_id',
        'price_cost',
        'price_sell',
        'discount_percentage',
        'stock_min',
        'weight',
        'condition',
        'is_active',
        'is_featured',
        'is_new',
        'is_trending',
        'is_bestseller',
        'is_on_sale',
        'published_at',
        'publish_start',
        'publish_end',
        'meta_title',
        'meta_description',
        'views_count',
        'sales_count',
    ];

    protected function casts(): array
    {
        return [
            'condition' => ProductCondition::class,
            'price_cost' => 'decimal:2',
            'price_sell' => 'decimal:2',
            'discount_percentage' => 'decimal:2',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_trending' => 'boolean',
            'is_bestseller' => 'boolean',
            'is_on_sale' => 'boolean',
            'published_at' => 'datetime',
            'publish_start' => 'datetime',
            'publish_end' => 'datetime',
        ];
    }

    // ==========================================
    // RELATIONSHIPS - Direct
    // ==========================================

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    // ==========================================
    // RELATIONSHIPS - Has Many (created in later batches)
    // ==========================================

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productSuppliers(): HasMany
    {
        return $this->hasMany(ProductSupplier::class);
    }

    // ==========================================
    // RELATIONSHIPS - Many to Many (created in later batches)
    // ==========================================

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'product_materials')
            ->withPivot('percentage');
    }

    public function occasions(): BelongsToMany
    {
        return $this->belongsToMany(Occasion::class, 'product_occasions');
    }

    public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'product_styles');
    }

    public function patterns(): BelongsToMany
    {
        return $this->belongsToMany(Pattern::class, 'product_patterns');
    }

    public function fits(): BelongsToMany
    {
        return $this->belongsToMany(Fit::class, 'product_fits');
    }

    public function lengths(): BelongsToMany
    {
        return $this->belongsToMany(Length::class, 'product_lengths');
    }

    public function necklines(): BelongsToMany
    {
        return $this->belongsToMany(Neckline::class, 'product_necklines');
    }

    public function sleeves(): BelongsToMany
    {
        return $this->belongsToMany(Sleeve::class, 'product_sleeves');
    }

    public function heelTypes(): BelongsToMany
    {
        return $this->belongsToMany(HeelType::class, 'product_heel_types');
    }

    public function closures(): BelongsToMany
    {
        return $this->belongsToMany(Closure::class, 'product_closures');
    }

    public function bodyTypes(): BelongsToMany
    {
        return $this->belongsToMany(BodyType::class, 'product_body_types')
            ->withPivot('recommendation_level');
    }

    public function careInstructions(): BelongsToMany
    {
        return $this->belongsToMany(CareInstruction::class, 'product_care_instructions');
    }

    public function certifications(): BelongsToMany
    {
        return $this->belongsToMany(Certification::class, 'product_certifications');
    }

    public function hairTypes(): BelongsToMany
    {
        return $this->belongsToMany(HairType::class, 'product_hair_types');
    }

    public function hairTextures(): BelongsToMany
    {
        return $this->belongsToMany(HairTexture::class, 'product_hair_textures');
    }

    public function capTypes(): BelongsToMany
    {
        return $this->belongsToMany(CapType::class, 'product_cap_types');
    }

    public function hairDensities(): BelongsToMany
    {
        return $this->belongsToMany(HairDensity::class, 'product_hair_densities');
    }

    public function hairOrigins(): BelongsToMany
    {
        return $this->belongsToMany(HairOrigin::class, 'product_hair_origins')
            ->withPivot('percentage');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'product_services')
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

    public function scopeOnSale($query)
    {
        return $query->where('is_on_sale', true);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeNew($query)
    {
        return $query->where('is_new', true);
    }

    public function scopeBestseller($query)
    {
        return $query->where('is_bestseller', true);
    }

    // ==========================================
    // ACCESSORS
    // ==========================================

    /**
     * Preço final com desconto aplicado.
     */
    public function getFinalPriceAttribute(): float
    {
        if ($this->discount_percentage > 0) {
            return round($this->price_sell * (1 - $this->discount_percentage / 100), 2);
        }

        return (float) $this->price_sell;
    }

    /**
     * Stock total somando todas as variações.
     */
    public function getTotalStockAttribute(): int
    {
        return $this->variations()->sum('stock_quantity');
    }

    /**
     * Verifica se o stock está abaixo do mínimo.
     */
    public function getIsLowStockAttribute(): bool
    {
        return $this->total_stock <= $this->stock_min;
    }

    /**
     * Imagem principal do produto.
     */
    public function getPrimaryImageAttribute(): ?string
    {
        return $this->images()->where('is_primary', true)->value('file_path');
    }
}
