<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        $usuarios = Usuario::with('perfil')->get();
        return response()->json($usuarios);
    }

    // Criar um novo usuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NomeCompleto' => 'required|string|max:100',
            'Email' => 'required|email|max:100|unique:usuarios,Email',
            'Senha' => 'required|string|min:6',
            'PerfilID' => 'required|integer|exists:perfis,PerfilID',
            'Telefone' => 'nullable|string|max:20',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'Matricula' => 'nullable|string|max:50|unique:usuarios,Matricula',
            'Ativo' => 'boolean',
            'MfaHabilitado' => 'boolean',
            'MfaSecret' => 'nullable|string',
            'MfaLastVerified' => 'nullable|date',
        ]);
        $validated['Senha'] = Hash::make($validated['Senha']);
        $usuario = Usuario::create($validated);
        return response()->json($usuario, 201);
    }

    // Visualizar detalhes de um usuário
    public function show($id)
    {
        $usuario = Usuario::with('perfil')->findOrFail($id);
        return response()->json($usuario);
    }

    // Atualizar um usuário
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $validated = $request->validate([
            'NomeCompleto' => 'sometimes|required|string|max:100',
            'Email' => 'sometimes|required|email|max:100|unique:usuarios,Email,' . $id . ',UsuarioID',
            'Senha' => 'nullable|string|min:6',
            'PerfilID' => 'sometimes|required|integer|exists:perfis,PerfilID',
            'Telefone' => 'nullable|string|max:20',
            'Cargo' => 'nullable|string|max:100',
            'Departamento' => 'nullable|string|max:100',
            'Matricula' => 'nullable|string|max:50|unique:usuarios,Matricula,' . $id . ',UsuarioID',
            'Ativo' => 'boolean',
            'MfaHabilitado' => 'boolean',
            'MfaSecret' => 'nullable|string',
            'MfaLastVerified' => 'nullable|date',
        ]);
        if (isset($validated['Senha'])) {
            $validated['Senha'] = Hash::make($validated['Senha']);
        } else {
            unset($validated['Senha']);
        }
        $usuario->update($validated);
        return response()->json($usuario);
    }

    // Remover um usuário
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(['message' => 'Usuário removido com sucesso.']);
    }
}
