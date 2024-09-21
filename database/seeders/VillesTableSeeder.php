<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VillesTableSeeder extends Seeder
{
    public function run()
    {
        $villes = [
            ['Nom' => 'Salé'],
            ['Nom' => 'Rabat'],
            ['Nom' => 'Temara'],
            ['Nom' => 'Skhirat'],
            ['Nom' => 'Ain Attig'],
            ['Nom' => 'Mers El Kheir'],
        ];

        foreach ($villes as $ville) {
            DB::table('villes')->insert([
                'Nom' => $ville['Nom'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
