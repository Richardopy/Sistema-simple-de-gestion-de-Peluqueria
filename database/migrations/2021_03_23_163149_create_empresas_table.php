<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->longText('info');
            $table->string('ruc')->nullable();
            $table->string('direccion');
            $table->string('logo')->nullable();
            $table->integer('telefono1');
            $table->integer('telefono2')->nullable();
            $table->integer('whatsapp')->nullable();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('correo')->nullable();
            $table->date('fundacion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
