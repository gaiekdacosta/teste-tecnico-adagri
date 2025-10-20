<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PropriedadeController extends Controller
{
    public function index()
    {
        return response()->json(
            Propriedade::with(['produtor', 'unidadesProducao', 'rebanhos'])->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            Propriedade::with(['produtor', 'unidadesProducao', 'rebanhos'])->findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'municipio' => 'required|string|max:100',
            'uf' => 'required|string|size:2',
            'inscricao_estadual' => 'required|string|max:30|unique:propriedades,inscricao_estadual',
            'area_total' => 'nullable|numeric',
            'produtor_id' => 'required|exists:produtores,id',
        ]);

        $propriedade = Propriedade::create($data);

        return response()->json($propriedade->load(['produtor', 'unidadesProducao', 'rebanhos']), 201);
    }

    public function update(Request $request, $id)
    {
        $propriedade = Propriedade::findOrFail($id);

        $data = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'municipio' => 'sometimes|required|string|max:100',
            'uf' => 'sometimes|required|string|size:2',
            'inscricao_estadual' => "sometimes|required|string|max:30|unique:propriedades,inscricao_estadual,{$id}",
            'area_total' => 'nullable|numeric',
            'produtor_id' => 'sometimes|required|exists:produtores,id',
        ]);

        $propriedade->update($data);

        return response()->json($propriedade->load(['produtor', 'unidadesProducao', 'rebanhos']));
    }

    public function destroy($id)
    {
        $propriedade = Propriedade::findOrFail($id);
        $propriedade->delete();
        return response()->json(null, 204);
    }
}
