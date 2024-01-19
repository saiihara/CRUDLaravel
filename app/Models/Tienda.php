<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tiendas';
    protected $primaryKey = 'id_tienda';
    protected $fillable = ['nombre', 'localizacion', 'cid', 'numero_trabajadores'];
    public $timestamps = false;

    //Definir la relaciçon entre tiendas y móviles
    public function phones()
    {
        //esto es porque un móvil puede pertenecer a varias tiendas "una tienda tiene muchos móviles"
        return $this->hasMany(Phone::class, 'tienda_id', 'id_tienda');
    }
}

//phone -> modelo con el que hacemos relacion
//tienda -> especifica la columna en la tabla phones que se usa como clave foránea para establecer la relación
//nombre -> Especifica la columna en la tabla tiendas que se utilizará para emparejar con la clave foránea.

