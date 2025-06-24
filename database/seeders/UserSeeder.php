<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cria os perfis
        $adminPerfil = \App\Models\Perfil::create([
            'Nome' => 'Administrador',
            'Permissoes' => json_encode([
                'admin' => true,
                'gestao' => true,
                'denuncias' => true
            ])
        ]);

        $userPerfil = \App\Models\Perfil::create([
            'Nome' => 'Usuário',
            'Permissoes' => json_encode([
                'gestao' => false,
                'denuncias' => true
            ])
        ]);

        // Cria os usuários
        $admin = Usuario::create([
            'NomeCompleto' => 'Administrador',
            'Email' => 'admin@empresa.com',
            'Senha' => Hash::make('admin123'),
            'PerfilID' => $adminPerfil->PerfilID,
            'Ativo' => true,
            'MfaHabilitado' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = Usuario::create([
            'NomeCompleto' => 'Usuário Comum',
            'Email' => 'usuario@empresa.com',
            'Senha' => Hash::make('usuario123'),
            'PerfilID' => $userPerfil->PerfilID,
            'Ativo' => true,
            'MfaHabilitado' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return [$admin, $user];
    }
}
