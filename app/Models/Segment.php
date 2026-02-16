<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Segment extends Model
{
    use HasFactory;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment).
     * Sem isto, Segment::create([...]) não funciona.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image_path',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    /**
     * Cast automático — quando lês is_active do BD, o Laravel
     * converte automaticamente para boolean PHP (true/false)
     * em vez de retornar 0 ou 1.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * RELAÇÃO: Um segmento tem muitas subcategorias.
     * Isto permite fazeres: $segment->subcategories
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    /**
     * RELAÇÃO: Um segmento tem muitos serviços.
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * SCOPE: Filtrar só os activos.
     * Uso: Segment::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * SCOPE: Ordenar pela ordem definida.
     * Uso: Segment::ordered()->get()
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}