<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
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

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthIdentifierName()
    {
        return 'UsuarioID';
    }

    public function getAuthPassword()
    {
        return $this->Senha;
    }

    public function getAuthPasswordName()
    {
        return 'Senha';
    }

    public function getRememberToken()
    {
        return $this->getAttribute('remember_token');
    }

    public function setRememberToken($value)
    {
        $this->setAttribute('remember_token', $value);
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

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
