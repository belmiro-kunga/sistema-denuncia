<?php

namespace Database\Seeders;

use App\Models\CategoriaDenuncia;
use Illuminate\Database\Seeder;

class CategoriaDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'NomeCategoria' => 'Assédio',
                'Descricao' => 'Casos de assédio sexual, moral ou racial',
                'RegrasRoteamentoPadrao' => json_encode([
                    'prioridade' => 'alta',
                    'equipe_responsavel' => 'RH'
                ])
            ],
            [
                'NomeCategoria' => 'Corrupção',
                'Descricao' => 'Casos de corrupção e fraude',
                'RegrasRoteamentoPadrao' => json_encode([
                    'prioridade' => 'alta',
                    'equipe_responsavel' => 'Compliance'
                ])
            ],
            [
                'NomeCategoria' => 'Conflito de Interesses',
                'Descricao' => 'Conflitos de interesses e ética',
                'RegrasRoteamentoPadrao' => json_encode([
                    'prioridade' => 'media',
                    'equipe_responsavel' => 'Compliance'
                ])
            ],
            [
                'NomeCategoria' => 'Irregularidades Financeiras',
                'Descricao' => 'Problemas financeiros e contábeis',
                'RegrasRoteamentoPadrao' => json_encode([
                    'prioridade' => 'alta',
                    'equipe_responsavel' => 'Financeiro'
                ])
            ]
        ];

        foreach ($categorias as $categoria) {
            CategoriaDenuncia::create($categoria);
        }
    }
}
