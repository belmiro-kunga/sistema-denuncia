<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComunicacaoCaso;

class ComunicacaoCasoController extends Controller
{
    // Listar todas as comunicações
    public function index()
    {
        $comunicacoes = ComunicacaoCaso::with(['caso', 'usuario'])->get();
        return response()->json($comunicacoes);
    }

    // Criar uma nova comunicação
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CasoID' => 'required|integer|exists:casos,CasoID',
            'UsuarioID' => 'required|integer|exists:usuarios,UsuarioID',
            'TipoComunicacao' => 'required|string|max:50',
            'Mensagem' => 'required|string',
            'DataComunicacao' => 'required|date',
            'Lida' => 'boolean',
        ]);
        $comunicacao = ComunicacaoCaso::create($validated);
        return response()->json($comunicacao, 201);
    }

    // Visualizar detalhes de uma comunicação
    public function show($id)
    {
        $comunicacao = ComunicacaoCaso::with(['caso', 'usuario'])->findOrFail($id);
        return response()->json($comunicacao);
    }

    // Atualizar uma comunicação
    public function update(Request $request, $id)
    {
        $comunicacao = ComunicacaoCaso::findOrFail($id);
        $validated = $request->validate([
            'TipoComunicacao' => 'sometimes|required|string|max:50',
            'Mensagem' => 'sometimes|required|string',
            'Lida' => 'boolean',
        ]);
        $comunicacao->update($validated);
        return response()->json($comunicacao);
    }

    // Remover uma comunicação
    public function destroy($id)
    {
        $comunicacao = ComunicacaoCaso::findOrFail($id);
        $comunicacao->delete();
        return response()->json(['message' => 'Comunicação removida com sucesso.']);
    }
}
