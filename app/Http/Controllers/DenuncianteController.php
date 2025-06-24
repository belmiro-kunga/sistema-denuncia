<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denunciante;

class DenuncianteController extends Controller
{
    // Listar todos os denunciantes
    public function index()
    {
        $denunciantes = Denunciante::all();
        return response()->json($denunciantes);
    }

    // Criar um novo denunciante
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nome' => 'required|string|max:100',
            'Email' => 'nullable|email|max:100|unique:denunciantes,Email',
            'Telefone' => 'nullable|string|max:20',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'Observacoes' => 'nullable|string',
        ]);
        $denunciante = Denunciante::create($validated);
        return response()->json($denunciante, 201);
    }

    // Visualizar detalhes de um denunciante
    public function show($id)
    {
        $denunciante = Denunciante::findOrFail($id);
        return response()->json($denunciante);
    }

    // Atualizar um denunciante
    public function update(Request $request, $id)
    {
        $denunciante = Denunciante::findOrFail($id);
        $validated = $request->validate([
            'Nome' => 'sometimes|required|string|max:100',
            'Email' => 'nullable|email|max:100|unique:denunciantes,Email,' . $id . ',DenuncianteID',
            'Telefone' => 'nullable|string|max:20',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'Observacoes' => 'nullable|string',
        ]);
        $denunciante->update($validated);
        return response()->json($denunciante);
    }

    // Remover um denunciante
    public function destroy($id)
    {
        $denunciante = Denunciante::findOrFail($id);
        $denunciante->delete();
        return response()->json(['message' => 'Denunciante removido com sucesso.']);
    }
}
