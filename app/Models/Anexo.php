<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table = 'anexos';
    protected $primaryKey = 'AnexoID';
    protected $fillable = [
        'CasoID',
        'DenunciaID',
        'NomeArquivo',
        'CaminhoArquivo',
        'TipoArquivo',
        'TamanhoBytes',
        'HashArquivo',
        'Descricao'
    ];

    public function caso()
    {
        return $this->belongsTo(Caso::class, 'CasoID', 'CasoID');
    }

    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'DenunciaID', 'DenunciaID');
    }
}
