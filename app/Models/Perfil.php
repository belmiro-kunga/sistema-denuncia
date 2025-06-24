<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfis';
    protected $primaryKey = 'PerfilID';
    protected $fillable = ['Nome', 'Permissoes'];
    public $timestamps = true;

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'perfil_permissao', 'PerfilID', 'PermissaoID');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'PerfilID');
    }
}
