<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletaAsignadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta_asignadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_boleta')->unsigned();
            $table->foreign('id_boleta')->references('id')->on('boletas');
            $table->bigInteger('id_comprador')->unsigned();
            $table->foreign('id_comprador')->references('id')->on('compradores');
            $table->enum('estado',['Activo','Cancelado'])->default('Activo');
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
        Schema::dropIfExists('boleta_asignadas');
    }
}
