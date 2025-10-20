<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeProducao extends Model
{
    use HasFactory;

    protected $table = 'unidades_producao';

    protected $fillable = [
        'nome_cultura',
        'area_total_ha',
        'coordenadas_geograficas',
        'propriedade_id',
    ];

    public function propriedade()
    {
        return $this->belongsTo(Propriedade::class);
    }
}
