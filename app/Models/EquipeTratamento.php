<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipeTratamento extends Model
{
    protected $table = 'equipestratamento';
    protected $primaryKey = 'EquipeID';
    protected $fillable = [
        'NomeEquipe',
        'Descricao',
        'ResponsavelID',
        'Ativo'
    ];

    public function responsavel()
    {
        return $this->belongsTo(Usuario::class, 'ResponsavelID', 'UsuarioID');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'equipe_usuario', 'EquipeID', 'UsuarioID');
    }
}
