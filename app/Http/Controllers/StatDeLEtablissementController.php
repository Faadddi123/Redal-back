<?php

namespace App\Http\Controllers;

use App\Models\StatDeLEtablissement;
use Illuminate\Http\Request;

class StatDeLEtablissementController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'activite' => 'required|string|max:255',
            'zone_industrielle' => 'required|string|max:255',
            'AEP' => 'required|string|max:255',
            'raccord_de_reseau_ass' => 'required|string|max:255',
            'Démarches_REDAL_END' => 'required|string|max:255',
            'photos_d_observation' => 'required|string|max:255',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $stat = StatDeLEtablissement::create($data);

        return response()->json($stat, 201);
    }

    public function update(Request $request, StatDeLEtablissement $stat)
    {
        $data = $request->validate([
            'activite' => 'sometimes|string|max:255',
            'zone_industrielle' => 'sometimes|string|max:255',
            'AEP' => 'sometimes|string|max:255',
            'raccord_de_reseau_ass' => 'sometimes|string|max:255',
            'Démarches_REDAL_END' => 'sometimes|string|max:255',
            'photos_d_observation' => 'sometimes|string|max:255',
            'etablissement_id' => 'sometimes|exists:etablissements,id',
        ]);

        $stat->update($data);

        return response()->json($stat, 200);
    }

    public function index()
    {
        $stats = StatDeLEtablissement::all();
        return response()->json($stats, 200);
    }

    public function show(StatDeLEtablissement $stat)
    {
        return response()->json($stat, 200);
    }

    public function delete(StatDeLEtablissement $stat)
    {
        $stat->delete();
        return response()->json(['message' => 'Stat deleted successfully'], 200);
    }
}
