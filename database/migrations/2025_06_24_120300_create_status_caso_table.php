<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusCasoTable extends Migration
{
    public function up()
    {
        Schema::create('statuscaso', function (Blueprint $table) {
            $table->bigInteger('StatusID')->unsigned()->autoIncrement();
            $table->string('NomeStatus', 100);
            $table->text('Descricao')->nullable();
            $table->boolean('PermiteComunicacaoDenunciante')->default(true);
            $table->boolean('IsFinal')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuscaso');
    }
}
