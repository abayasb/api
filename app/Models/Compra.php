<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'codcompra',
        'cantidad',
        'valor',
        'totalcompra',
        'id_articulo',
        'id_proveedor'
    ];

   /**
    * Get the proveedor that owns the Compra
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function proveedor(): BelongsTo
   {
       return $this->belongsTo(Proveedor::class, 'id_proveedor');
   }

   /**
    * Get the articulo that owns the Compra
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function articulo(): BelongsTo
   {
       return $this->belongsTo(Articulo::class,'id_articulo');
   }
}
