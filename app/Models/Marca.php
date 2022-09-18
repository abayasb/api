<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;

    protected $fillable=[
        'codmarca',
        'detalle'
    ];

    /**
     * Get all of the Articulos for the Marca
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Articulos(): HasMany
    {
        return $this->hasMany(Articulo::class, 'id_marca');
    }
}
