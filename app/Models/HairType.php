<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'characteristics',
        'durability',
        'price_range',
        'can_be_dyed',
        'can_be_heat_styled',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'can_be_dyed' => 'boolean',
            'can_be_heat_styled' => 'boolean',
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