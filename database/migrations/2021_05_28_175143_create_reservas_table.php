<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->enum('estado', ['pendiente','confirmada','cancelada','perdida'])
                 ->default('pendiente');

            $table->dateTime('hora');
            $table->date('fecha');
            $table->timestamps();
            /* relacion uno a muchos con mesas */
            $table->unsignedBigInteger('mesa_id');
            $table->foreign('mesa_id')->references('id')->on('mesas');

            /* relacion uno a muchos con usuarios */
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
