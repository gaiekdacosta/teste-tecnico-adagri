<?php

namespace App\Http\Controllers;

use App\Models\UnidadeProducao;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UnidadeProducaoController extends Controller
{
    public function index()
    {
        return response()->json(UnidadeProducao::with('propriedade')->get());
    }

    public function show($id)
    {
        return response()->json(UnidadeProducao::with('propriedade')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_cultura' => 'required|string|max:255',
            'area_total_ha' => 'nullable|numeric',
            'coordenadas_geograficas' => 'nullable|string|max:255',
            'propriedade_id' => 'required|exists:propriedades,id',
        ]);

        $unidade = UnidadeProducao::create($data);
        return response()->json($unidade->load('propriedade'), 201);
    }

    public function update(Request $request, $id)
    {
        $unidade = UnidadeProducao::findOrFail($id);

        $data = $request->validate([
            'nome_cultura' => 'sometimes|required|string|max:255',
            'area_total_ha' => 'nullable|numeric',
            'coordenadas_geograficas' => 'nullable|string|max:255',
            'propriedade_id' => 'sometimes|required|exists:propriedades,id',
        ]);

        $unidade->update($data);
        return response()->json($unidade->load('propriedade'));
    }

    public function destroy($id)
    {
        $unidade = UnidadeProducao::findOrFail($id);
        $unidade->delete();
        return response()->json(null, 204);
    }
}
