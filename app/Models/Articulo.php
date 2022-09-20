<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codarticulo',
        'detalle',
        'stock',
        'valorcompra',
        'valorventa',
        'id_marca',
        'id_tipo'
    ];

    /**
     * Get the tipo that owns the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }
    
    /**
     * Get the marca that owns the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    /**
     * Get all of the compras for the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class, 'id_articulo', 'id');
    }
}
