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
            'categoria_id' => 'required|integer|exists:categoriasdenuncia,CategoriaID',
            'descricao' => 'required|string',
            'anonima' => 'nullable|boolean',
            'nome_denunciante' => 'nullable|string|max:100',
            'email_denunciante' => 'nullable|email|max:100',
            'anexos.*' => 'file|max:5120|mimes:jpg,jpeg,png,pdf'
        ]);

        // Se não for anônima, cria ou busca denunciante
        $denuncianteId = null;
        if (empty($validated['anonima']) && ($validated['nome_denunciante'] || $validated['email_denunciante'])) {
            $denunciante = \App\Models\Denunciante::firstOrCreate(
                [
                    'Email' => $validated['email_denunciante'] ?? null,
                    'Nome' => $validated['nome_denunciante'] ?? null,
                ]
            );
            $denuncianteId = $denunciante->DenuncianteID;
        }

        // Cria a denúncia
        $denuncia = \App\Models\Denuncia::create([
            'CategoriaID' => $validated['categoria_id'],
            'Descricao' => $validated['descricao'],
            'DenuncianteID' => $denuncianteId,
            'DataHoraDenuncia' => now(),
            'NivelRiscoInicial' => 1, // ou outro valor padrão
            // outros campos conforme necessário
        ]);

        // Salva os anexos, se houver
        if ($request->hasFile('anexos')) {
            foreach ($request->file('anexos') as $file) {
                $path = $file->store('anexos');
                // Relacione o anexo à denúncia, se houver model Anexo
                \App\Models\Anexo::create([
                    'DenunciaID' => $denuncia->DenunciaID,
                    'NomeArquivo' => $file->getClientOriginalName(),
                    'CaminhoArquivo' => $path,
                    'TipoArquivo' => $file->getClientMimeType(),
                    'TamanhoBytes' => $file->getSize(),
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Denúncia registrada com sucesso!']);
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
