<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'codproveedor',
        'nombre_ape',
        'direccion',
        'email',
        'telefono'
    ];

    /**
     * Get all of the compras for the Proveedor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class, 'id_proveedor');
    }
    
}
