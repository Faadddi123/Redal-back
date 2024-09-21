<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientEtablissement extends Pivot
{
    use HasFactory;

    protected $table = 'client_etablissement';

    protected $fillable = [
        'client_id',
        'etablissement_id',
    ];
}
