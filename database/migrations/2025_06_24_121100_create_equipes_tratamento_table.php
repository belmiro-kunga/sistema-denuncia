<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesTratamentoTable extends Migration
{
    public function up()
    {
        Schema::create('equipes_tratamento', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('responsavel_id')->references('UsuarioID')->on('usuarios')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        // Tabela pivot para relacionamento muitos-para-muitos
        Schema::create('equipe_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipe_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('equipe_id')->references('id')->on('equipes_tratamento')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('usuario_id')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['equipe_id', 'usuario_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipe_usuario');
        Schema::dropIfExists('equipes_tratamento');
    }
}
