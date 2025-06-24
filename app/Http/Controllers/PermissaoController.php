<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;

class PermissaoController extends Controller
{
    // Listar todas as permissões
    public function index()
    {
        $permissoes = Permissao::all();
        return response()->json($permissoes);
    }

    // Criar uma nova permissão
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomePermissao' => 'required|string|max:100|unique:permissoes,NomePermissao',
            'Descricao' => 'nullable|string',
        ]);
        $permissao = Permissao::create($validated);
        return response()->json($permissao, 201);
    }

    // Visualizar detalhes de uma permissão
    public function show($id)
    {
        $permissao = Permissao::findOrFail($id);
        return response()->json($permissao);
    }

    // Atualizar uma permissão
    public function update(Request $request, $id)
    {
        $permissao = Permissao::findOrFail($id);
        $validated = $request->validate([
            'NomePermissao' => 'sometimes|required|string|max:100|unique:permissoes,NomePermissao,' . $id . ',PermissaoID',
            'Descricao' => 'nullable|string',
        ]);
        $permissao->update($validated);
        return response()->json($permissao);
    }

    // Remover uma permissão
    public function destroy($id)
    {
        $permissao = Permissao::findOrFail($id);
        $permissao->delete();
        return response()->json(['message' => 'Permissão removida com sucesso.']);
    }
}
