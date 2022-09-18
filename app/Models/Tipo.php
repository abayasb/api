<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable  = [
        'codtipo',
        'detalle'
    ];

   /**
    * Get all of the articulos for the Tipo
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function articulos(): HasMany
   {
       return $this->hasMany(Articulo::class, 'id_tipo');
   }
}
