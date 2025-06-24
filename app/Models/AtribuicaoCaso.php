<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtribuicaoCaso extends Model
{
    protected $table = 'atribuicoescaso';
    protected $primaryKey = 'AtribuicaoID';
    protected $fillable = [
        'CasoID',
        'UsuarioID',
        'DataAtribuicao',
        'Observacoes'
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
