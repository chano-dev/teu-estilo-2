<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'material_type',
        'is_natural',
        'care_level',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_natural' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeNatural($query)
    {
        return $query->where('is_natural', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('material_type', $type);
    }
}