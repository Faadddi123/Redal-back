<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatDeLab extends Model
{
    use HasFactory;

    protected $table = 'resultat_de_labs';

    protected $fillable = [
        'PH',
        'Temp_Air',
        'Temp_Eau',
        'Conductivité_à_μs_cm_20°C',
        'Conductivité_à_μs_cm_25°C',
        'Salinité_g_par_L',
        'Turbidité_NTU',
        'DCO_mgO2_par_L',
        'DBO5_mgO2_par_L',
        'MES_mg_par_L',
        'Na_mg_par_L',
        'Cl_mg_par_L',
        'NO3_mg_par_L',
        'Phénois_mg_par_L',
        'CN_mg_par_L',
        'SO42_mg_par_L',
        'As_mg_par_L',
        'Cd_mg_par_L',
        'Cr_mg_par_L',
        'Cu_mg_par_L',
        'Fe_mg_par_L',
        'Hg_mg_par_L',
        'Ni_mg_par_L',
        'Pb_mg_par_L',
        'Sn_mg_par_L',
        'Zn_mg_par_L',
        'stat_etablissement_id',
    ];

    public function statDeLEtablissement()
    {
        return $this->belongsTo(StatDeLEtablissement::class);
    }
}
