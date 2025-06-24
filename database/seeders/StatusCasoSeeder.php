<?php

namespace Database\Seeders;

use App\Models\StatusCaso;
use Illuminate\Database\Seeder;

class StatusCasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'NomeStatus' => 'Aberto',
                'Descricao' => 'Caso aberto e em investigação',
                'PermiteComunicacaoDenunciante' => true,
                'IsFinal' => false
            ],
            [
                'NomeStatus' => 'Em Investigação',
                'Descricao' => 'Investigação em andamento',
                'PermiteComunicacaoDenunciante' => true,
                'IsFinal' => false
            ],
            [
                'NomeStatus' => 'Resolvido',
                'Descricao' => 'Caso resolvido',
                'PermiteComunicacaoDenunciante' => false,
                'IsFinal' => true
            ],
            [
                'NomeStatus' => 'Arquivado',
                'Descricao' => 'Caso arquivado sem conclusão',
                'PermiteComunicacaoDenunciante' => false,
                'IsFinal' => true
            ]
        ];

        foreach ($status as $st) {
            StatusCaso::create($st);
        }
    }
}
