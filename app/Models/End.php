<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class End extends Model
{
    use HasFactory;

    protected $table = 'ends';

    protected $fillable = [
        'Object_de_la_demande',
        'Nom_du_project',
        'Adresse_du_project',
        'Secteur_d_activiter',
        'Suite_a_donner',
        'etablissement_id',
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
