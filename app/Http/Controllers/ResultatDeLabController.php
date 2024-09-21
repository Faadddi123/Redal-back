<?php

namespace App\Http\Controllers;

use App\Models\ResultatDeLab;
use Illuminate\Http\Request;

class ResultatDeLabController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'PH' => 'required|numeric',
            'Temp_Air' => 'required|numeric',
            'Temp_Eau' => 'required|numeric',
            'Conductivité_à_μs_cm_20°C' => 'required|numeric',
            'Conductivité_à_μs_cm_25°C' => 'required|numeric',
            'Salinité_g_par_L' => 'required|numeric',
            'Turbidité_NTU' => 'required|numeric',
            'DCO_mgO2_par_L' => 'required|numeric',
            'DBO5_mgO2_par_L' => 'required|numeric',
            'MES_mg_par_L' => 'required|numeric',
            'Na_mg_par_L' => 'required|numeric',
            'Cl_mg_par_L' => 'required|numeric',
            'NO3_mg_par_L' => 'required|numeric',
            'Phénois_mg_par_L' => 'required|numeric',
            'CN_mg_par_L' => 'required|numeric',
            'SO42_mg_par_L' => 'required|numeric',
            'As_mg_par_L' => 'required|numeric',
            'Cd_mg_par_L' => 'required|numeric',
            'Cr_mg_par_L' => 'required|numeric',
            'Cu_mg_par_L' => 'required|numeric',
            'Fe_mg_par_L' => 'required|numeric',
            'Hg_mg_par_L' => 'required|numeric',
            'Ni_mg_par_L' => 'required|numeric',
            'Pb_mg_par_L' => 'required|numeric',
            'Sn_mg_par_L' => 'required|numeric',
            'Zn_mg_par_L' => 'required|numeric',
            'stat_de_l_etablissement_id' => 'required|exists:stat_de_l_etablissement,id',
        ]);

        $resultat = ResultatDeLab::create($data);

        return response()->json($resultat, 201);
    }

    public function update(Request $request, ResultatDeLab $resultat)
    {
        $data = $request->validate([
            'PH' => 'sometimes|numeric',
            'Temp_Air' => 'sometimes|numeric',
            'Temp_Eau' => 'sometimes|numeric',
            'Conductivité_à_μs_cm_20°C' => 'sometimes|numeric',
            'Conductivité_à_μs_cm_25°C' => 'sometimes|numeric',
            'Salinité_g_par_L' => 'sometimes|numeric',
            'Turbidité_NTU' => 'sometimes|numeric',
            'DCO_mgO2_par_L' => 'sometimes|numeric',
            'DBO5_mgO2_par_L' => 'sometimes|numeric',
            'MES_mg_par_L' => 'sometimes|numeric',
            'Na_mg_par_L' => 'sometimes|numeric',
            'Cl_mg_par_L' => 'sometimes|numeric',
            'NO3_mg_par_L' => 'sometimes|numeric',
            'Phénois_mg_par_L' => 'sometimes|numeric',
            'CN_mg_par_L' => 'sometimes|numeric',
            'SO42_mg_par_L' => 'sometimes|numeric',
            'As_mg_par_L' => 'sometimes|numeric',
            'Cd_mg_par_L' => 'sometimes|numeric',
            'Cr_mg_par_L' => 'sometimes|numeric',
            'Cu_mg_par_L' => 'sometimes|numeric',
            'Fe_mg_par_L' => 'sometimes|numeric',
            'Hg_mg_par_L' => 'sometimes|numeric',
            'Ni_mg_par_L' => 'sometimes|numeric',
            'Pb_mg_par_L' => 'sometimes|numeric',
            'Sn_mg_par_L' => 'sometimes|numeric',
            'Zn_mg_par_L' => 'sometimes|numeric',
            'stat_de_l_etablissement_id' => 'sometimes|exists:stat_de_l_etablissement,id',
        ]);

        $resultat->update($data);

        return response()->json($resultat, 200);
    }
}
