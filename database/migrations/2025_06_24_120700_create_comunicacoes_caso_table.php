<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicacoesCasoTable extends Migration
{
    public function up()
    {
        Schema::create('comunicacoescaso', function (Blueprint $table) {
            $table->id('ComunicacaoID');
            $table->bigInteger('CasoID')->unsigned();
            $table->bigInteger('UsuarioID')->unsigned();
            $table->string('TipoComunicacao', 50);
            $table->text('Mensagem');
            $table->date('DataComunicacao');
            $table->boolean('Lida')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('CasoID')->references('CasoID')->on('casos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('UsuarioID')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comunicacoescaso');
    }
}
