<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'Nom_preNom',
        'Num_de_Tel',
        'Email',
        'Password',
        'Localisation',
        'Verifier',
    ];

    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, 'client_etablissement');
    }
}
