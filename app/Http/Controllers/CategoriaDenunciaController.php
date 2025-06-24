<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaDenuncia;

class CategoriaDenunciaController extends Controller
{
    // Listar todas as categorias
    public function index()
    {
        $categorias = CategoriaDenuncia::all();
        return response()->json($categorias);
    }

    // Criar uma nova categoria
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomeCategoria' => 'required|string|max:100|unique:categoriasdenuncia,NomeCategoria',
            'Descricao' => 'nullable|string',
            'RegrasRoteamentoPadrao' => 'nullable|json',
            'Ativo' => 'boolean',
        ]);
        $categoria = CategoriaDenuncia::create($validated);
        return response()->json($categoria, 201);
    }

    // Visualizar detalhes de uma categoria
    public function show($id)
    {
        $categoria = CategoriaDenuncia::findOrFail($id);
        return response()->json($categoria);
    }

    // Atualizar uma categoria
    public function update(Request $request, $id)
    {
        $categoria = CategoriaDenuncia::findOrFail($id);
        $validated = $request->validate([
            'NomeCategoria' => 'sometimes|required|string|max:100|unique:categoriasdenuncia,NomeCategoria,' . $id . ',CategoriaID',
            'Descricao' => 'nullable|string',
            'RegrasRoteamentoPadrao' => 'nullable|json',
            'Ativo' => 'boolean',
        ]);
        $categoria->update($validated);
        return response()->json($categoria);
    }

    // Remover uma categoria
    public function destroy($id)
    {
        $categoria = CategoriaDenuncia::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria removida com sucesso.']);
    }
}
