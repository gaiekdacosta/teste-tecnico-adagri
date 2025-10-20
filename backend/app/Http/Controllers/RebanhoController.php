<?php

namespace App\Http\Controllers;

use App\Models\Rebanho;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RebanhoController extends Controller
{
    public function index()
    {
        return response()->json(Rebanho::with('propriedade')->get());
    }

    public function show($id)
    {
        return response()->json(Rebanho::with('propriedade')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'especie' => 'required|string|max:100',
            'quantidade' => 'required|integer|min:0',
            'finalidade' => 'nullable|string|max:255',
            'data_atualizacao' => 'required|date',
            'propriedade_id' => 'required|exists:propriedades,id',
        ]);

        $rebanho = Rebanho::create($data);
        return response()->json($rebanho->load('propriedade'), 201);
    }

    public function update(Request $request, $id)
    {
        $rebanho = Rebanho::findOrFail($id);

        $data = $request->validate([
            'especie' => 'sometimes|required|string|max:100',
            'quantidade' => 'sometimes|required|integer|min:0',
            'finalidade' => 'nullable|string|max:255',
            'data_atualizacao' => 'sometimes|required|date',
            'propriedade_id' => 'sometimes|required|exists:propriedades,id',
        ]);

        $rebanho->update($data);
        return response()->json($rebanho->load('propriedade'));
    }

    public function destroy($id)
    {
        $rebanho = Rebanho::findOrFail($id);
        $rebanho->delete();
        return response()->json(null, 204);
    }
}
