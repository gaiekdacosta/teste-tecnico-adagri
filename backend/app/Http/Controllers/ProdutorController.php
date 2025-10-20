<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Produtor;
use Illuminate\Http\Request;

class ProdutorController extends Controller
{
    public function index()
    {
        $produtores = Produtor::with([
            'propriedades.unidadesProducao',
            'propriedades.rebanhos'
        ])->get();

        return response()->json($produtores);
    }

    public function show($id)
    {
        $produtor = Produtor::with([
            'propriedades.unidadesProducao',
            'propriedades.rebanhos'
        ])->findOrFail($id);

        return response()->json($produtor);
    }
}
