<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireIndustries;
use Illuminate\Http\Request;

class QuestionnaireIndustriesController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'Raison_social' => 'required|string|max:255',
            'Adresse' => 'required|string|max:255',
            'Tel_Responsable' => 'required|string|max:20',
            'Secteur_D_activite' => 'required|string|max:255',
            'CIL' => 'required|string|max:255',
            'Taille' => 'required|string|max:255',
            'Alimentation_en_EP' => 'required|string|max:255',
            'Usage_de_eau' => 'required|string|max:255',
            'Quantite_EP' => 'required|string|max:255',
            'Raccordement_au_reseau_d_assainissement_Redal' => 'required|string|max:255',
            'Pretraitement_ou_Tretement_des_EU' => 'required|string|max:255',
            'Description_de_systeme_de_pretraitement_ou_tretement' => 'required|string|max:255',
            'Certification' => 'required|string|max:255',
            'Type_de_ISO' => 'required|string|max:255',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $questionnaire = QuestionnaireIndustries::create($data);

        return response()->json($questionnaire, 201);
    }

    public function update(Request $request, QuestionnaireIndustries $questionnaire)
    {
        $data = $request->validate([
            'Raison_social' => 'sometimes|string|max:255',
            'Adresse' => 'sometimes|string|max:255',
            'Tel_Responsable' => 'sometimes|string|max:20',
            'Secteur_D_activite' => 'sometimes|string|max:255',
            'CIL' => 'sometimes|string|max:255',
            'Taille' => 'sometimes|string|max:255',
            'Alimentation_en_EP' => 'sometimes|string|max:255',
            'Usage_de_eau' => 'sometimes|string|max:255',
            'Quantite_EP' => 'sometimes|string|max:255',
            'Raccordement_au_reseau_d_assainissement_Redal' => 'sometimes|string|max:255',
            'Pretraitement_ou_Tretement_des_EU' => 'sometimes|string|max:255',
            'Description_de_systeme_de_pretraitement_ou_tretement' => 'sometimes|string|max:255',
            'Certification' => 'sometimes|string|max:255',
            'Type_de_ISO' => 'sometimes|string|max:255',
            'etablissement_id' => 'sometimes|exists:etablissements,id',
        ]);

        $questionnaire->update($data);

        return response()->json($questionnaire, 200);
    }
}
