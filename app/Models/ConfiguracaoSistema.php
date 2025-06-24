<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracaoSistema extends Model
{
    protected $table = 'configuracoessistema';
    protected $primaryKey = 'ConfiguracaoID';
    protected $fillable = [
        'Chave',
        'Valor',
        'Tipo',
        'Descricao'
    ];
}
