<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->string('tabla_afectada');
            $table->timestamps(); // Agregar campo de fecha y hora
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
