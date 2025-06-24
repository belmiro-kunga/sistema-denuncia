<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id('AnexoID');
            $table->bigInteger('CasoID')->unsigned()->nullable();
            $table->bigInteger('DenunciaID')->unsigned()->nullable();
            $table->string('NomeArquivo', 255);
            $table->string('CaminhoArquivo', 255);
            $table->string('TipoArquivo', 50);
            $table->integer('TamanhoBytes');
            $table->string('HashArquivo', 64);
            $table->text('Descricao')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('CasoID')->references('CasoID')->on('casos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('DenunciaID')->references('DenunciaID')->on('denuncias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anexos');
    }
}
