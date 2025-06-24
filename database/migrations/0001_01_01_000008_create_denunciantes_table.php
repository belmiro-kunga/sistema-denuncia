<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciantesTable extends Migration
{
    public function up()
    {
        Schema::create('denunciantes', function (Blueprint $table) {
            $table->id('DenuncianteID');
            $table->string('Nome', 100);
            $table->string('Email', 100)->nullable();
            $table->string('Telefone', 20)->nullable();
            $table->string('Cargo', 100)->nullable();
            $table->string('Departamento', 100)->nullable();
            $table->text('Observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('denunciantes');
    }
}
