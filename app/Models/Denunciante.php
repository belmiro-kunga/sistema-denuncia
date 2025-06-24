<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denunciante extends Model
{
    protected $table = 'denunciantes';
    protected $primaryKey = 'DenuncianteID';
    protected $fillable = [
        'Nome',
        'Email',
        'Telefone',
        'Cargo',
        'Departamento',
        'Observacoes'
    ];

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'DenuncianteID', 'DenuncianteID');
    }
}
