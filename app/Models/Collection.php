<?php

namespace App\Models;

use App\Enums\Season;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'year',
        'season',
        'starts_at',
        'ends_at',
        'is_active',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'season' => Season::class,
            'starts_at' => 'date',
            'ends_at' => 'date',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'year' => 'integer',
        ];
    }

    /**
     * Uma coleção tem muitos produtos.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

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

    /**
     * Coleções atualmente em vigor (entre starts_at e ends_at).
     */
    public function scopeCurrent($query)
    {
        $now = now()->toDateString();

        return $query->where('starts_at', '<=', $now)
                     ->where('ends_at', '>=', $now);
    }
}