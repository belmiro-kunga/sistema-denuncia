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
        Schema::create('perfil_permissao', function (Blueprint $table) {
            $table->unsignedBigInteger('PerfilID');
            $table->unsignedBigInteger('PermissaoID');
            $table->primary(['PerfilID', 'PermissaoID']);
            $table->foreign('PerfilID')->references('PerfilID')->on('perfis')->onDelete('cascade');
            $table->foreign('PermissaoID')->references('PermissaoID')->on('permissoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_permissao');
    }
};
