<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    // Listar todos os perfis
    public function index()
    {
        $perfis = Perfil::with('permissoes')->get();
        return response()->json($perfis);
    }

    // Criar um novo perfil
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomePerfil' => 'required|string|max:100|unique:perfis,NomePerfil',
            'Descricao' => 'nullable|string',
        ]);
        $perfil = Perfil::create($validated);
        return response()->json($perfil, 201);
    }

    // Visualizar detalhes de um perfil
    public function show($id)
    {
        $perfil = Perfil::with('permissoes')->findOrFail($id);
        return response()->json($perfil);
    }

    // Atualizar um perfil
    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        $validated = $request->validate([
            'NomePerfil' => 'sometimes|required|string|max:100|unique:perfis,NomePerfil,' . $id . ',PerfilID',
            'Descricao' => 'nullable|string',
        ]);
        $perfil->update($validated);
        return response()->json($perfil);
    }

    // Remover um perfil
    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return response()->json(['message' => 'Perfil removido com sucesso.']);
    }
}
