<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id('CasoID');
            $table->string('NumeroCaso', 50)->unique();
            $table->bigInteger('DenunciaID')->unsigned();
            $table->bigInteger('StatusCasoID')->unsigned();
            $table->bigInteger('UsuarioResponsavelID')->unsigned();
            $table->text('Descricao');
            $table->date('DataAbertura');
            $table->date('DataPrevistaConclusao')->nullable();
            $table->date('DataConclusao')->nullable();
            $table->text('Resultado')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('DenunciaID')->references('DenunciaID')->on('denuncias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('StatusCasoID')->references('StatusID')->on('statuscaso')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('UsuarioResponsavelID')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
