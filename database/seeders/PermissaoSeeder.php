<?php

namespace Database\Seeders;

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissoes = [
            [
                'NomePermissao' => 'ver_denuncias',
                'Descricao' => 'Permissão para visualizar denúncias'
            ],
            [
                'NomePermissao' => 'criar_denuncias',
                'Descricao' => 'Permissão para criar denúncias'
            ],
            [
                'NomePermissao' => 'editar_denuncias',
                'Descricao' => 'Permissão para editar denúncias'
            ],
            [
                'NomePermissao' => 'ver_casos',
                'Descricao' => 'Permissão para visualizar casos'
            ],
            [
                'NomePermissao' => 'editar_casos',
                'Descricao' => 'Permissão para editar casos'
            ],
            [
                'NomePermissao' => 'gerenciar_usuarios',
                'Descricao' => 'Permissão para gerenciar usuários'
            ]
        ];

        foreach ($permissoes as $permissao) {
            Permissao::create($permissao);
        }
    }
}
