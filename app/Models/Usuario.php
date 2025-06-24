<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'UsuarioID';
    protected $fillable = [
        'NomeCompleto',
        'Email',
        'Senha',
        'Telefone',
        'Cargo',
        'Departamento',
        'Matricula',
        'Ativo',
        'PerfilID',
        'MfaHabilitado',
        'MfaSecret',
        'MfaLastVerified'
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'PerfilID', 'PerfilID');
    }

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'UsuarioID', 'UsuarioID');
    }

    public function casosResponsavel()
    {
        return $this->hasMany(Caso::class, 'UsuarioResponsavelID', 'UsuarioID');
    }

    public function equipes()
    {
        return $this->belongsToMany(EquipeTratamento::class, 'equipe_usuario', 'UsuarioID', 'EquipeID');
    }
}
