<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdelantosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adelantos', function (Blueprint $table) {
            $table->increments('idadelanto');
            $table->unsignedInteger('idempleado');
            $table->string('descripcion');
            $table->date('fecha');
            $table->decimal('monto',8,2);
            $table->foreign('idempleado')->references('id')->on('empleados');
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
        Schema::dropIfExists('adelantos');
    }
}
