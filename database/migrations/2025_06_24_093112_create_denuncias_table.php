<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id('DenunciaID');
            $table->string('Titulo', 255);
            $table->text('Descricao');
            $table->bigInteger('UsuarioID')->unsigned();
            $table->bigInteger('CategoriaID')->unsigned();
            $table->bigInteger('DenuncianteID')->unsigned();
            $table->date('DataHoraDenuncia');
            $table->integer('NivelRiscoInicial')->default(1);
            $table->text('PessoasEnvolvidas')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('UsuarioID')->references('UsuarioID')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('CategoriaID')->references('CategoriaID')->on('categoriasdenuncia')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('DenuncianteID')->references('DenuncianteID')->on('denunciantes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
