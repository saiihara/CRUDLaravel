<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    // Laravel protegerá contra vulnerabilidades de asignación masiva de forma predeterminada. Esto significa que debe especificar qué campos se pueden “rellenar” (es decir, se pueden asignar en masa) el modelo de teléfono.
    protected $fillable = ['modelo', 'tienda_id', 'lanzamiento', 'pantalla', 'precio'];

    public function tienda()
    {
        
        //La relación entre Tienda y Phone es de uno a muchos (una tienda tiene muchos teléfonos, pero un teléfono pertenece a una sola tienda)
        //"un teléfono pertenece a una tienda"
        return $this->belongsTo(Tienda::class, 'tienda_id', 'id_tienda');

    }
}

//tienda_id -> Especifica la columna en la tabla phones que se utiliza como clave foránea para establecer la relación con la tabla tiendas
// Segundo tienda_id -> Especifica la columna en la tabla tiendas que se utilizará para emparejar con la clave foránea
