<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsAuditoriaTable extends Migration
{
    public function up()
    {
        Schema::create('logsauditoria', function (Blueprint $table) {
            $table->id('LogID');
            $table->bigInteger('UsuarioID')->unsigned();
            $table->string('TipoAcao', 50);
            $table->string('Tabela', 50);
            $table->bigInteger('RegistroID')->unsigned();
            $table->json('DadosAntigos')->nullable();
            $table->json('DadosNovos')->nullable();
            $table->text('Descricao')->nullable();
            $table->timestamp('DataHora')->useCurrent();
            $table->softDeletes();

            $table->foreign('UsuarioID')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('logsauditoria');
    }
}
