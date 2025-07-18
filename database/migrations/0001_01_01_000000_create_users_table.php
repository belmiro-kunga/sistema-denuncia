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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('UsuarioID');
            $table->string('NomeCompleto', 100);
            $table->string('Email', 100)->unique();
            $table->string('Senha', 255);
            $table->string('Telefone', 20)->nullable();
            $table->string('Cargo', 100)->nullable();
            $table->string('Departamento', 100)->nullable();
            $table->string('Matricula', 50)->unique()->nullable();
            $table->boolean('Ativo')->default(true);
            $table->bigInteger('PerfilID')->unsigned();
            $table->boolean('MfaHabilitado')->default(false);
            $table->string('MfaSecret')->nullable();
            $table->timestamp('MfaLastVerified')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
