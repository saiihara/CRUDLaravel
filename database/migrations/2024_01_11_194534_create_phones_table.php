<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('phones', function (Blueprint $table) {
        $table->id();
        $table->string('modelo');
        $table->string('tienda');
        $table->string('lanzamiento');
        $table->string('pantalla')->default('grande'); 
        $table->integer('precio');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
