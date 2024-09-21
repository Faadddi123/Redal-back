<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireIndustries extends Model
{
    use HasFactory;

    protected $table = 'questionnaire_industries';

    protected $fillable = [
        'Raison_social',
        'Adresse',
        'Tel_Responsable',
        'Secteur_D_activite',
        'CIL',
        'Taille',
        'Alimentation_en_EP',
        'Usage_de_eau',
        'Quantite_EP',
        'Raccordement_au_reseau_d_assainissement_Redal',
        'Pretraitement_ou_Tretement_des_EU',
        'Description_de_systeme_de_pretraitement_ou_tretement',
        'Certification',
        'Type_de_ISO',
        'etablissement_id',
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
