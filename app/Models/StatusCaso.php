<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusCaso extends Model
{
    protected $table = 'statuscaso';
    protected $primaryKey = 'StatusID';
    protected $fillable = ['NomeStatus', 'Descricao', 'PermiteComunicacaoDenunciante', 'IsFinal'];
    public $timestamps = false;

    public function casos()
    {
        return $this->hasMany(Caso::class, 'StatusCasoID');
    }
}
