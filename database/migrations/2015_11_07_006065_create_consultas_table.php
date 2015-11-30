<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('id_especialista')->unsigned()->nullable();
            $table->foreign('id_especialista')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('valor_consulta');
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
        Schema::drop('consultas');
    }

}
