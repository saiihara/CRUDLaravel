<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(){
        //Se realiza una modificación en la tabla 'phones'
        Schema::table('phones', function (Blueprint $table) {
             //Se agrega una columna 'tienda_id' de tipo entero sin signo
            $table->unsignedBigInteger('tienda_id')->nullable()->default(null)->autoIncrement();
            //Se establece una clave foránea ('tienda_id') que hace referencia a la columna 'id_tienda' en la tabla 'tiendas'
            $table->foreign('tienda_id')->references('id_tienda')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->dropForeign(['tienda_id']);
            $table->dropColumn('tienda_id');
        });
    }
};


// $table->unsignedBigInteger('tienda_id') -> Se crea una columna "tienda_id" en la tabla actual de tipo BigInteger
// nullable -> Indica que la columna puede almacenar valores nulos. 
// default(null) -> Si no se proporciona un valor al insertar un nuevo registro y la columna no puede ser nula, se utilizará el valor predeterminado (null)
// autoIncrement() -> La columna es autoincremental