<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'municipio',
        'uf',
        'inscricao_estadual',
        'area_total',
        'produtor_id',
    ];

    public function produtor()
    {
        return $this->belongsTo(Produtor::class);
    }

    public function unidadesProducao()
    {
        return $this->hasMany(UnidadeProducao::class);
    }

    public function rebanhos()
    {
        return $this->hasMany(Rebanho::class);
    }
}
