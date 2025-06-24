<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventSqlInjection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Lista de caracteres suspeitos
        $suspiciousChars = [';', '--', '/*', '*/', '@@', 'char(', 'exec', 'xp_', 'sp_', 'union', 'select', 'drop', 'delete'];
        
        // Verificar todos os parâmetros da requisição
        foreach ($request->all() as $key => $value) {
            if (is_string($value)) {
                foreach ($suspiciousChars as $char) {
                    if (stripos($value, $char) !== false) {
                        abort(403, 'SQL Injection attempt detected!');
                    }
                }
            }
        }

        return $next($request);
    }
}
