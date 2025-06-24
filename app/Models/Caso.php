<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $table = 'casos';
    protected $primaryKey = 'CasoID';
    protected $fillable = [
        'NumeroCaso',
        'DenunciaID',
        'StatusCasoID',
        'UsuarioResponsavelID',
        'Descricao',
        'DataAbertura',
        'DataPrevistaConclusao',
        'DataConclusao',
        'Resultado'
    ];

    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'DenunciaID', 'DenunciaID');
    }

    public function status()
    {
        return $this->belongsTo(StatusCaso::class, 'StatusCasoID', 'StatusID');
    }

    public function usuarioResponsavel()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioResponsavelID', 'UsuarioID');
    }
}
