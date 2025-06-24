<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogAuditoria;

class LogAuditoriaController extends Controller
{
    // Listar todos os logs de auditoria
    public function index()
    {
        $logs = LogAuditoria::with('usuario')->orderByDesc('DataHora')->get();
        return response()->json($logs);
    }

    // Visualizar detalhes de um log de auditoria
    public function show($id)
    {
        $log = LogAuditoria::with('usuario')->findOrFail($id);
        return response()->json($log);
    }
}
