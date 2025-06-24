<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtribuicaoCaso;

class AtribuicaoCasoController extends Controller
{
    // Listar todas as atribuições
    public function index()
    {
        $atribuicoes = AtribuicaoCaso::with(['caso', 'usuario'])->get();
        return response()->json($atribuicoes);
    }

    // Criar uma nova atribuição
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CasoID' => 'required|integer|exists:casos,CasoID',
            'UsuarioID' => 'required|integer|exists:usuarios,UsuarioID',
            'DataAtribuicao' => 'required|date',
            'Observacoes' => 'nullable|string',
        ]);
        $atribuicao = AtribuicaoCaso::create($validated);
        return response()->json($atribuicao, 201);
    }

    // Visualizar detalhes de uma atribuição
    public function show($id)
    {
        $atribuicao = AtribuicaoCaso::with(['caso', 'usuario'])->findOrFail($id);
        return response()->json($atribuicao);
    }

    // Atualizar uma atribuição
    public function update(Request $request, $id)
    {
        $atribuicao = AtribuicaoCaso::findOrFail($id);
        $validated = $request->validate([
            'DataAtribuicao' => 'sometimes|required|date',
            'Observacoes' => 'nullable|string',
        ]);
        $atribuicao->update($validated);
        return response()->json($atribuicao);
    }

    // Remover uma atribuição
    public function destroy($id)
    {
        $atribuicao = AtribuicaoCaso::findOrFail($id);
        $atribuicao->delete();
        return response()->json(['message' => 'Atribuição removida com sucesso.']);
    }
}
