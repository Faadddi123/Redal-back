<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Client([
            'Nom_preNom'    => $row['contact_nom'], // Assuming the column name in the Excel file is 'contact_nom'
            'Num_de_Tel'    => $row['tel'],         // Assuming the column name in the Excel file is 'tel'
            'Email'         => $row['mail'],        // Assuming the column name in the Excel file is 'mail'
            'Localisation'  => $row['adresse'],     // Assuming the column name in the Excel file is 'adresse'
            'Password'      => bcrypt('password'), // Set a default password or handle this according to your logic
            'Verifier'      => 0,                   // Set default value for 'Verifier'
        ]);
    }
}
