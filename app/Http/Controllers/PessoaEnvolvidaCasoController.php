<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PessoaEnvolvidaCaso;

class PessoaEnvolvidaCasoController extends Controller
{
    // Listar todas as pessoas envolvidas
    public function index()
    {
        $pessoas = PessoaEnvolvidaCaso::with('caso')->get();
        return response()->json($pessoas);
    }

    // Cadastrar uma nova pessoa envolvida
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CasoID' => 'required|integer|exists:casos,CasoID',
            'Nome' => 'required|string|max:100',
            'Email' => 'nullable|email|max:100',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'TipoEnvolvimento' => 'required|string|max:50',
            'Observacoes' => 'nullable|string',
        ]);
        $pessoa = PessoaEnvolvidaCaso::create($validated);
        return response()->json($pessoa, 201);
    }

    // Visualizar detalhes de uma pessoa envolvida
    public function show($id)
    {
        $pessoa = PessoaEnvolvidaCaso::with('caso')->findOrFail($id);
        return response()->json($pessoa);
    }

    // Atualizar uma pessoa envolvida
    public function update(Request $request, $id)
    {
        $pessoa = PessoaEnvolvidaCaso::findOrFail($id);
        $validated = $request->validate([
            'Nome' => 'sometimes|required|string|max:100',
            'Email' => 'nullable|email|max:100',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'TipoEnvolvimento' => 'sometimes|required|string|max:50',
            'Observacoes' => 'nullable|string',
        ]);
        $pessoa->update($validated);
        return response()->json($pessoa);
    }

    // Remover uma pessoa envolvida
    public function destroy($id)
    {
        $pessoa = PessoaEnvolvidaCaso::findOrFail($id);
        $pessoa->delete();
        return response()->json(['message' => 'Pessoa envolvida removida com sucesso.']);
    }
}
