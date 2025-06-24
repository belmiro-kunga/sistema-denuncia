<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfiguracaoSistema;

class ConfiguracaoSistemaController extends Controller
{
    // Listar todas as configurações
    public function index()
    {
        $configs = ConfiguracaoSistema::all();
        return response()->json($configs);
    }

    // Criar uma nova configuração
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Chave' => 'required|string|max:100|unique:configuracoessistema,Chave',
            'Valor' => 'required|string',
            'Tipo' => 'required|string|max:50',
            'Descricao' => 'nullable|string',
        ]);
        $config = ConfiguracaoSistema::create($validated);
        return response()->json($config, 201);
    }

    // Visualizar detalhes de uma configuração
    public function show($id)
    {
        $config = ConfiguracaoSistema::findOrFail($id);
        return response()->json($config);
    }

    // Atualizar uma configuração
    public function update(Request $request, $id)
    {
        $config = ConfiguracaoSistema::findOrFail($id);
        $validated = $request->validate([
            'Chave' => 'sometimes|required|string|max:100|unique:configuracoessistema,Chave,' . $id . ',ConfiguracaoID',
            'Valor' => 'sometimes|required|string',
            'Tipo' => 'sometimes|required|string|max:50',
            'Descricao' => 'nullable|string',
        ]);
        $config->update($validated);
        return response()->json($config);
    }

    // Remover uma configuração
    public function destroy($id)
    {
        $config = ConfiguracaoSistema::findOrFail($id);
        $config->delete();
        return response()->json(['message' => 'Configuração removida com sucesso.']);
    }
}
