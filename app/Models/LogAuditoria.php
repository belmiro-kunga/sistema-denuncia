<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAuditoria extends Model
{
    protected $table = 'logsauditoria';
    protected $primaryKey = 'LogID';
    protected $fillable = [
        'UsuarioID',
        'TipoAcao',
        'Tabela',
        'RegistroID',
        'DadosAntigos',
        'DadosNovos',
        'Descricao',
        'DataHora'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioID', 'UsuarioID');
    }
}
