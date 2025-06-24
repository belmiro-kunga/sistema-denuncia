<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        $usuario = Usuario::where('Email', $credentials['email'])->first();
        
        if ($usuario && Hash::check($credentials['password'], $usuario->Senha)) {
            if (!$usuario->Ativo) {
                return back()->withErrors([
                    'email' => 'Usuário inativo'
                ])->onlyInput('email');
            }

            // Definir o guard antes de fazer o login
            Auth::guard('web')->login($usuario);
            $request->session()->regenerate();
            return redirect()->intended('/denuncias');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
