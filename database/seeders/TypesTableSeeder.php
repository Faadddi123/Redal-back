<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['NomDeType' => 'IND'],
            ['NomDeType' => 'HC'],
            ['NomDeType' => 'RH'],
            ['NomDeType' => 'SS'],
        ];

        foreach ($types as $type) {
            DB::table('types')->insert([
                'NomDeType' => $type['NomDeType'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
