<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesTratamentoTable extends Migration
{
    public function up()
    {
        Schema::create('equipestratamento', function (Blueprint $table) {
            $table->id('EquipeID');
            $table->string('NomeEquipe', 100);
            $table->text('Descricao')->nullable();
            $table->bigInteger('ResponsavelID')->unsigned()->nullable();
            $table->boolean('Ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ResponsavelID')->references('UsuarioID')->on('usuarios')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        // Tabela pivot para relacionamento muitos-para-muitos
        Schema::create('equipe_usuario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('EquipeID')->unsigned();
            $table->bigInteger('UsuarioID')->unsigned();
            $table->timestamps();

            $table->foreign('EquipeID')->references('EquipeID')->on('equipestratamento')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('UsuarioID')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['EquipeID', 'UsuarioID']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipe_usuario');
        Schema::dropIfExists('equipestratamento');
    }
}
