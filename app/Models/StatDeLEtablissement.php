<?php

// app/Models/StatDeLEtablissement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatDeLEtablissement extends Model
{
    use HasFactory;

    protected $table = 'stat_etablissements';

    protected $fillable = [
        'activite',
        'zone_industrielle',
        'AEP',
        'raccord_de_reseau_ass',
        'Démarches_REDAL_END',
        'photos_d_observation',
        'etablissement_id',
        'Production',
        'matiere_premiere',
        'secteur_d_activiter',
        'operation_industriel',
        'usage_eau_id',
        'STEP_id',
        'Puits',
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function resultatDeLab()
    {
        return $this->hasOne(ResultatDeLab::class, 'stat_etablissement_id');
    }
}
