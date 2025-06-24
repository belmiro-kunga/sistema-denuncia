<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caso;

class CasoController extends Controller
{
    // Listar todos os casos
    public function index()
    {
        $casos = Caso::with(['denuncia', 'status', 'usuarioResponsavel'])->get();
        return response()->json($casos);
    }

    // Criar um novo caso
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NumeroCaso' => 'required|string|max:50|unique:casos,NumeroCaso',
            'DenunciaID' => 'required|integer|exists:denuncias,DenunciaID',
            'StatusCasoID' => 'required|integer|exists:statuscaso,StatusID',
            'UsuarioResponsavelID' => 'required|integer|exists:usuarios,UsuarioID',
            'Descricao' => 'required|string',
            'DataAbertura' => 'required|date',
            'DataPrevistaConclusao' => 'nullable|date',
            'DataConclusao' => 'nullable|date',
            'Resultado' => 'nullable|string',
        ]);
        $caso = Caso::create($validated);
        return response()->json($caso, 201);
    }

    // Visualizar detalhes de um caso
    public function show($id)
    {
        $caso = Caso::with(['denuncia', 'status', 'usuarioResponsavel'])->findOrFail($id);
        return response()->json($caso);
    }

    // Atualizar um caso
    public function update(Request $request, $id)
    {
        $caso = Caso::findOrFail($id);
        $validated = $request->validate([
            'NumeroCaso' => 'sometimes|required|string|max:50|unique:casos,NumeroCaso,' . $id . ',CasoID',
            'DenunciaID' => 'sometimes|required|integer|exists:denuncias,DenunciaID',
            'StatusCasoID' => 'sometimes|required|integer|exists:statuscaso,StatusID',
            'UsuarioResponsavelID' => 'sometimes|required|integer|exists:usuarios,UsuarioID',
            'Descricao' => 'sometimes|required|string',
            'DataAbertura' => 'sometimes|required|date',
            'DataPrevistaConclusao' => 'nullable|date',
            'DataConclusao' => 'nullable|date',
            'Resultado' => 'nullable|string',
        ]);
        $caso->update($validated);
        return response()->json($caso);
    }

    // Remover um caso
    public function destroy($id)
    {
        $caso = Caso::findOrFail($id);
        $caso->delete();
        return response()->json(['message' => 'Caso removido com sucesso.']);
    }
}
