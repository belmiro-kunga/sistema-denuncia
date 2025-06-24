<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComunicacaoCaso extends Model
{
    protected $table = 'comunicacoescaso';
    protected $primaryKey = 'ComunicacaoID';
    protected $fillable = [
        'CasoID',
        'UsuarioID',
        'TipoComunicacao',
        'Mensagem',
        'DataComunicacao',
        'Lida'
    ];

    public function caso()
    {
        return $this->belongsTo(Caso::class, 'CasoID', 'CasoID');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioID', 'UsuarioID');
    }
}
