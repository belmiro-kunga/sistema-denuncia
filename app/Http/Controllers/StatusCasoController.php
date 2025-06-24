<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusCaso;

class StatusCasoController extends Controller
{
    // Listar todos os status
    public function index()
    {
        $status = StatusCaso::all();
        return response()->json($status);
    }

    // Criar um novo status
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomeStatus' => 'required|string|max:100|unique:statuscaso,NomeStatus',
            'Descricao' => 'nullable|string',
            'PermiteComunicacaoDenunciante' => 'boolean',
            'IsFinal' => 'boolean',
        ]);
        $status = StatusCaso::create($validated);
        return response()->json($status, 201);
    }

    // Visualizar detalhes de um status
    public function show($id)
    {
        $status = StatusCaso::findOrFail($id);
        return response()->json($status);
    }

    // Atualizar um status
    public function update(Request $request, $id)
    {
        $status = StatusCaso::findOrFail($id);
        $validated = $request->validate([
            'NomeStatus' => 'sometimes|required|string|max:100|unique:statuscaso,NomeStatus,' . $id . ',StatusID',
            'Descricao' => 'nullable|string',
            'PermiteComunicacaoDenunciante' => 'boolean',
            'IsFinal' => 'boolean',
        ]);
        $status->update($validated);
        return response()->json($status);
    }

    // Remover um status
    public function destroy($id)
    {
        $status = StatusCaso::findOrFail($id);
        $status->delete();
        return response()->json(['message' => 'Status removido com sucesso.']);
    }
}
