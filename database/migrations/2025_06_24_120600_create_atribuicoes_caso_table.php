<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtribuicoesCasoTable extends Migration
{
    public function up()
    {
        Schema::create('atribuicoescaso', function (Blueprint $table) {
            $table->id('AtribuicaoID');
            $table->bigInteger('CasoID')->unsigned();
            $table->bigInteger('UsuarioID')->unsigned();
            $table->date('DataAtribuicao');
            $table->text('Observacoes')->nullable();
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
        Schema::dropIfExists('atribuicoescaso');
    }
}
