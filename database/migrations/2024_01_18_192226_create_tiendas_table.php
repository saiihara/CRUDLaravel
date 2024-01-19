<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id('id_tienda');
            $table->string('nombre');
            $table->string('localizacion');
            $table->string('cid');
            $table->integer('numero_trabajadores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}


