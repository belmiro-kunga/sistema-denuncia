<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDatabaseConnection extends Command
{
    protected $signature = 'test:database';
    protected $description = 'Testa a conexão com o banco de dados e verifica os dados';

    public function handle()
    {
        try {
            // Testar conexão com o banco
            DB::connection()->getPdo();
            $this->info('✅ Conexão com o banco de dados estabelecida com sucesso!');

            // Verificar se as tabelas existem
            $tables = DB::select('SHOW TABLES');
            $this->info('Tabelas encontradas no banco:');
            foreach ($tables as $table) {
                $this->info('- ' . array_values((array)$table)[0]);
            }

            // Verificar usuários
            $users = DB::table('usuarios')->count();
            $this->info("\nUsuários encontrados: {$users}");

            // Verificar denúncias
            $denuncias = DB::table('denuncias')->count();
            $this->info("Denúncias encontradas: {$denuncias}");

            // Verificar casos
            $casos = DB::table('casos')->count();
            $this->info("Casos encontrados: {$casos}");

            // Verificar perfis
            $perfis = DB::table('perfis')->count();
            $this->info("Perfis encontrados: {$perfis}");

            $this->info('\n✅ Teste concluído com sucesso!');
        } catch (\Exception $e) {
            $this->error('❌ Erro ao testar a conexão com o banco: ' . $e->getMessage());
        }
    }
}
