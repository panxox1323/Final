<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_insumos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_insumo')->unsigned();
            $table->foreign('id_insumo')
                ->references('id')
                ->on('insumos')
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->date('fecha');


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
        Schema::drop('detalle_insumos');
    }
}
