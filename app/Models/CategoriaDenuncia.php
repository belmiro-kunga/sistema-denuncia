<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaDenuncia extends Model
{
    protected $table = 'categoriasdenuncia';
    protected $primaryKey = 'CategoriaID';
    protected $fillable = ['NomeCategoria', 'Descricao', 'RegrasRoteamentoPadrao'];
    public $timestamps = false;

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'CategoriaID');
    }
}
