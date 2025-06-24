<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventXSS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Lista de tags HTML suspeitas
        $suspiciousTags = ['<script>', '<iframe>', '<object>', '<embed>', '<applet>', '<meta>', '<link>', '<style>'];
        
        // Verificar todos os parâmetros da requisição
        foreach ($request->all() as $key => $value) {
            if (is_string($value)) {
                foreach ($suspiciousTags as $tag) {
                    if (stripos($value, $tag) !== false) {
                        abort(403, 'XSS attempt detected!');
                    }
                }
                // Sanitizar a entrada
                $request[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }

        return $next($request);
    }
}
