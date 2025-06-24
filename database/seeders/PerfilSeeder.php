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
                'NomePerfil' => 'Administrador',
                'Descricao' => 'Administrador do sistema com acesso completo'
            ],
            [
                'NomePerfil' => 'Investigador',
                'Descricao' => 'Responsável por investigar denúncias'
            ],
            [
                'NomePerfil' => 'Analista',
                'Descricao' => 'Análise de denúncias e casos'
            ]
        ];

        foreach ($perfis as $perfil) {
            Perfil::create($perfil);
        }
    }
}
