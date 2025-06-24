<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;

class DenunciaController extends Controller
{
    // Listar todas as denúncias
    public function index()
    {
        $denuncias = Denuncia::with(['usuario', 'denunciante', 'categoria'])->get();
        return response()->json($denuncias);
    }

    // Cadastrar uma nova denúncia
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Titulo' => 'required|string|max:255',
            'Descricao' => 'required|string',
            'UsuarioID' => 'required|integer|exists:usuarios,UsuarioID',
            'CategoriaID' => 'required|integer|exists:categoriasdenuncia,CategoriaID',
            'DenuncianteID' => 'required|integer|exists:denunciantes,DenuncianteID',
            'DataHoraDenuncia' => 'required|date',
            'NivelRiscoInicial' => 'required|integer',
        ]);

        $denuncia = Denuncia::create($validated);
        return response()->json($denuncia, 201);
    }

    // Visualizar detalhes de uma denúncia
    public function show($id)
    {
        $denuncia = Denuncia::with(['usuario', 'denunciante', 'categoria'])->findOrFail($id);
        return response()->json($denuncia);
    }

    // Atualizar uma denúncia
    public function update(Request $request, $id)
    {
        $denuncia = Denuncia::findOrFail($id);
        $validated = $request->validate([
            'Titulo' => 'sometimes|required|string|max:255',
            'Descricao' => 'sometimes|required|string',
            'UsuarioID' => 'sometimes|required|integer|exists:usuarios,UsuarioID',
            'CategoriaID' => 'sometimes|required|integer|exists:categoriasdenuncia,CategoriaID',
            'DenuncianteID' => 'sometimes|required|integer|exists:denunciantes,DenuncianteID',
            'DataHoraDenuncia' => 'sometimes|required|date',
            'NivelRiscoInicial' => 'sometimes|required|integer',
        ]);
        $denuncia->update($validated);
        return response()->json($denuncia);
    }

    // Remover uma denúncia
    public function destroy($id)
    {
        $denuncia = Denuncia::findOrFail($id);
        $denuncia->delete();
        return response()->json(['message' => 'Denúncia removida com sucesso.']);
    }
}
