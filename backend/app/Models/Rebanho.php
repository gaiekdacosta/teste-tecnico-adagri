<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rebanho extends Model
{
    use HasFactory;

    protected $fillable = [
        'especie',
        'quantidade',
        'finalidade',
        'data_atualizacao',
        'propriedade_id',
    ];

    public function propriedade()
    {
        return $this->belongsTo(Propriedade::class);
    }
}
