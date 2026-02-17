<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairDensity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'percentage',
        'description',
        'volume_level',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'percentage' => 'integer',
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
}