<?php

namespace App\Http\Controllers;

use App\Models\End;
use Illuminate\Http\Request;

class EndController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'Object_de_la_demande' => 'required|string|max:255',
            'Nom_du_project' => 'required|string|max:255',
            'Adresse_du_project' => 'required|string|max:255',
            'Secteur_d_activiter' => 'required|string|max:255',
            'Suite_a_donner' => 'required|string|max:255',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $end = End::create($data);

        return response()->json($end, 201);
    }

    public function update(Request $request, End $end)
    {
        $data = $request->validate([
            'Object_de_la_demande' => 'sometimes|string|max:255',
            'Nom_du_project' => 'sometimes|string|max:255',
            'Adresse_du_project' => 'sometimes|string|max:255',
            'Secteur_d_activiter' => 'sometimes|string|max:255',
            'Suite_a_donner' => 'sometimes|string|max:255',
            'etablissement_id' => 'sometimes|exists:etablissements,id',
        ]);

        $end->update($data);

        return response()->json($end, 200);
    }
}
