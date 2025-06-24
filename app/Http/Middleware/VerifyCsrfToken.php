<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'stripe/*',
        'api/*'
    ];

    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Se for uma requisição AJAX, não verifica o token CSRF
        if ($request->ajax()) {
            return $next($request);
        }

        if ($this->isReading($request) || $this->runningUnitTests() || $this->inExceptArray($request)) {
            return $next($request);
        }

        try {
            // Verifica se o token CSRF está presente
            $token = $request->input('_token');
            if (empty($token)) {
                return response()->json(['error' => 'Token CSRF não encontrado'], 419);
            }

            // Verifica se o token corresponde ao token da sessão
            $sessionToken = $request->session()->token();
            if (!hash_equals($sessionToken, $token)) {
                return response()->json(['error' => 'Token CSRF inválido'], 419);
            }

            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao verificar token CSRF: ' . $e->getMessage()], 500);
        }
    }
}
