<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anexo;
use Illuminate\Support\Facades\Storage;

class AnexoController extends Controller
{
    // Listar todos os anexos
    public function index()
    {
        $anexos = Anexo::with(['caso', 'denuncia'])->get();
        return response()->json($anexos);
    }

    // Fazer upload de um novo anexo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CasoID' => 'nullable|integer|exists:casos,CasoID',
            'DenunciaID' => 'nullable|integer|exists:denuncias,DenunciaID',
            'Descricao' => 'nullable|string',
            'arquivo' => 'required|file|max:10240', // até 10MB
        ]);

        $file = $request->file('arquivo');
        $path = $file->store('anexos');

        $anexo = Anexo::create([
            'CasoID' => $validated['CasoID'] ?? null,
            'DenunciaID' => $validated['DenunciaID'] ?? null,
            'NomeArquivo' => $file->getClientOriginalName(),
            'CaminhoArquivo' => $path,
            'TipoArquivo' => $file->getClientMimeType(),
            'TamanhoBytes' => $file->getSize(),
            'HashArquivo' => hash_file('sha256', $file->getRealPath()),
            'Descricao' => $validated['Descricao'] ?? null,
        ]);

        return response()->json($anexo, 201);
    }

    // Visualizar detalhes de um anexo
    public function show($id)
    {
        $anexo = Anexo::with(['caso', 'denuncia'])->findOrFail($id);
        return response()->json($anexo);
    }

    // Atualizar metadados de um anexo
    public function update(Request $request, $id)
    {
        $anexo = Anexo::findOrFail($id);
        $validated = $request->validate([
            'Descricao' => 'nullable|string',
        ]);
        $anexo->update($validated);
        return response()->json($anexo);
    }

    // Remover um anexo
    public function destroy($id)
    {
        $anexo = Anexo::findOrFail($id);
        Storage::delete($anexo->CaminhoArquivo);
        $anexo->delete();
        return response()->json(['message' => 'Anexo removido com sucesso.']);
    }
}
