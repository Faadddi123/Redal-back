<?php
// app/Models/Etablissement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $table = 'etablissements';

    protected $fillable = [
        'Nom',
        'Localisation',
        'exister',
        'unité_polluante',
        'type_id',
        'id_type',
        'ville_id',
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_etablissement');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function questionnaireIndustries()
    {
        return $this->hasOne(QuestionnaireIndustries::class, 'etablissement_id');
    }

    public function end()
    {
        return $this->hasOne(End::class, 'etablissement_id');
    }

    public function statDeLEtablissement()
    {
        return $this->hasOne(StatDeLEtablissement::class, 'etablissement_id');
    }
}
