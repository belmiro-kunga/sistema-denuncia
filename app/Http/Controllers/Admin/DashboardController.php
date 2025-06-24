<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Simulação de dados para o dashboard
        $totalDenuncias = 45;
        $denunciasAbertas = 12;
        $casosResolvidos = 28;
        $usuariosAtivos = 15;

        $denunciasRecentes = [
            [
                'titulo' => 'Assédio no Departamento de Vendas',
                'categoria' => 'Assédio',
                'data' => '2025-06-24',
                'status' => 'Em Investigação',
            ],
            [
                'titulo' => 'Irregularidade Financeira',
                'categoria' => 'Irregularidades Financeiras',
                'data' => '2025-06-23',
                'status' => 'Aberto',
            ],
            [
                'titulo' => 'Conflito de Interesses',
                'categoria' => 'Conflito de Interesses',
                'data' => '2025-06-22',
                'status' => 'Resolvido',
            ],
        ];

        $distribuicaoCategorias = [
            ['nome' => 'Assédio', 'quantidade' => 12],
            ['nome' => 'Corrupção', 'quantidade' => 7],
            ['nome' => 'Conflito de Interesses', 'quantidade' => 3],
            ['nome' => 'Irregularidades Financeiras', 'quantidade' => 10],
            ['nome' => 'Fraude', 'quantidade' => 10],
        ];

        return view('admin.dashboard', compact(
            'totalDenuncias',
            'denunciasAbertas',
            'casosResolvidos',
            'usuariosAtivos',
            'denunciasRecentes',
            'distribuicaoCategorias'
        ));
    }
} 