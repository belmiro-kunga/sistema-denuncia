<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';
    protected $primaryKey = 'PermissaoID';
    protected $fillable = ['NomePermissao', 'Descricao'];
    public $timestamps = false;

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_permissao', 'PermissaoID', 'PerfilID');
    }
}
