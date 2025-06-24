<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipeTratamento;

class EquipeTratamentoController extends Controller
{
    // Listar todas as equipes
    public function index()
    {
        $equipes = EquipeTratamento::with('usuarios', 'responsavel')->get();
        return response()->json($equipes);
    }

    // Criar uma nova equipe
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomeEquipe' => 'required|string|max:100|unique:equipestratamento,NomeEquipe',
            'Descricao' => 'nullable|string',
            'ResponsavelID' => 'nullable|integer|exists:usuarios,UsuarioID',
            'Ativo' => 'boolean',
        ]);
        $equipe = EquipeTratamento::create($validated);
        return response()->json($equipe, 201);
    }

    // Visualizar detalhes de uma equipe
    public function show($id)
    {
        $equipe = EquipeTratamento::with('usuarios', 'responsavel')->findOrFail($id);
        return response()->json($equipe);
    }

    // Atualizar uma equipe
    public function update(Request $request, $id)
    {
        $equipe = EquipeTratamento::findOrFail($id);
        $validated = $request->validate([
            'NomeEquipe' => 'sometimes|required|string|max:100|unique:equipestratamento,NomeEquipe,' . $id . ',EquipeID',
            'Descricao' => 'nullable|string',
            'ResponsavelID' => 'nullable|integer|exists:usuarios,UsuarioID',
            'Ativo' => 'boolean',
        ]);
        $equipe->update($validated);
        return response()->json($equipe);
    }

    // Remover uma equipe
    public function destroy($id)
    {
        $equipe = EquipeTratamento::findOrFail($id);
        $equipe->delete();
        return response()->json(['message' => 'Equipe removida com sucesso.']);
    }
}
