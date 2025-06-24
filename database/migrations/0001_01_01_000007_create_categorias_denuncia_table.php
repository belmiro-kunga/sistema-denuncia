<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasDenunciaTable extends Migration
{
    public function up()
    {
        Schema::create('categoriasdenuncia', function (Blueprint $table) {
            $table->bigInteger('CategoriaID')->unsigned()->autoIncrement();
            $table->string('NomeCategoria', 100);
            $table->text('Descricao')->nullable();
            $table->json('RegrasRoteamentoPadrao')->nullable();
            $table->boolean('Ativo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoriasdenuncia');
    }
}
