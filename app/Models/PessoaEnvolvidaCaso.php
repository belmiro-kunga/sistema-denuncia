<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaEnvolvidaCaso extends Model
{
    protected $table = 'pessoasenvolvidascaso';
    protected $primaryKey = 'PessoaEnvolvidaID';
    protected $fillable = [
        'CasoID',
        'Nome',
        'Email',
        'Cargo',
        'Departamento',
        'TipoEnvolvimento',
        'Observacoes'
    ];

    public function caso()
    {
        return $this->belongsTo(Caso::class, 'CasoID', 'CasoID');
    }
}
