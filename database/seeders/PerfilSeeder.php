<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfis = [
            [
                'Nome' => 'Administrador',
                'Permissoes' => json_encode([
                    'admin' => true,
                    'gestao' => true,
                    'denuncias' => true
                ])
            ],
            [
                'Nome' => 'Usuário',
                'Permissoes' => json_encode([
                    'gestao' => false,
                    'denuncias' => true
                ])
            ]
        ];

        foreach ($perfis as $perfil) {
            Perfil::create($perfil);
        }
    }
}
