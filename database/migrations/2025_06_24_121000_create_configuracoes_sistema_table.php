<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesSistemaTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoessistema', function (Blueprint $table) {
            $table->id('ConfiguracaoID');
            $table->string('Chave', 100)->unique();
            $table->text('Valor');
            $table->string('Tipo', 50);
            $table->text('Descricao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracoessistema');
    }
}
