<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasEnvolvidasCasoTable extends Migration
{
    public function up()
    {
        Schema::create('pessoasenvolvidascaso', function (Blueprint $table) {
            $table->id('PessoaEnvolvidaID');
            $table->bigInteger('CasoID')->unsigned();
            $table->string('Nome', 100);
            $table->string('Email', 100)->nullable();
            $table->string('Cargo', 100)->nullable();
            $table->string('Departamento', 100)->nullable();
            $table->string('TipoEnvolvimento', 50);
            $table->text('Observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('CasoID')->references('CasoID')->on('casos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoasenvolvidascaso');
    }
}
