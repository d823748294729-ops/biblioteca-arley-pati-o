<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'autor',
        'anio',
        'categoria_id',
        'disponible'
    ];

    protected $casts = [
        'disponible' => 'boolean',
        'anio' => 'integer'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function scopeBuscar(Builder $query, ?string $titulo): Builder
    {
        return $query->when($titulo, function ($consulta) use ($titulo) {
            $consulta->where('titulo', 'like', '%' . $titulo . '%');
        });
    }

    public function scopeFiltrarCategoria(Builder $query, $categoriaId): Builder
    {
        return $query->when($categoriaId, function ($consulta) use ($categoriaId) {
            $consulta->where('categoria_id', $categoriaId);
        });
    }
}
