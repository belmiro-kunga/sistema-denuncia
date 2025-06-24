<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';
    protected $primaryKey = 'DenunciaID';
    protected $fillable = [
        'Titulo',
        'Descricao',
        'UsuarioID',
        'CategoriaID',
        'DenuncianteID',
        'DataHoraDenuncia',
        'NivelRiscoInicial',
        'PessoasEnvolvidas'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioID', 'UsuarioID');
    }

    public function denunciante()
    {
        return $this->belongsTo(Denunciante::class, 'DenuncianteID', 'DenuncianteID');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaDenuncia::class, 'CategoriaID', 'CategoriaID');
    }
}
