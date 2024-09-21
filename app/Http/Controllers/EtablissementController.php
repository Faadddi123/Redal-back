<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\StatDeLEtablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtablissementController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'Nom' => 'required|string|max:255',
            'Localisation' => 'required|string|max:255',
            'exister' => 'boolean',
            'unité_polluante' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $etablissement = Etablissement::create($data);

        return response()->json($etablissement, 201);
    }


    public function countByType()
    {
        $counts = Etablissement::select('type_id', DB::raw('count(*) as total'))
            ->groupBy('type_id')
            ->with('type')
            ->get()
            ->map(function($item) {
                return [
                    'type' => $item->type->NomDeType,
                    'count' => $item->total
                ];
            });

        return response()->json($counts);
    }

    public function countBySecteur()
    {
        $counts = StatDeLEtablissement::select('secteur_d_activiter', DB::raw('count(*) as count'))
            ->groupBy('secteur_d_activiter')
            ->get();

        return response()->json($counts);
    }


    public function countByMonth()
{
    $currentYear = date('Y');
    $establishments = Etablissement::all();

    $monthlyData = array_fill(1, 12, 0);

    foreach ($establishments as $establishment) {
        if (preg_match('/(\d{2})-(\d{4})/', $establishment->id_type, $matches)) {
            $month = (int)$matches[1];
            $year = (int)$matches[2];

            if ($year == $currentYear) {
                $monthlyData[$month]++;
            }
        }
    }

    return response()->json($monthlyData);
}


    public function countByPuits()
    {
        $data = StatDeLEtablissement::selectRaw('IF(Puits = 1, "With Puits", "Without Puits") as status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        return response()->json($data);
    }

    public function countByYear()
    {
        $etablissements = Etablissement::all();
        $yearCounts = [];

        foreach ($etablissements as $etablissement) {
            // Extract the year from the id_type field
            $idType = $etablissement->id_type;
            preg_match('/\d{4}/', $idType, $matches);
            $year = $matches[0] ?? 'Unknown';

            if (!isset($yearCounts[$year])) {
                $yearCounts[$year] = 0;
            }
            $yearCounts[$year]++;
        }

        $result = [];
        foreach ($yearCounts as $year => $count) {
            $result[] = ['year' => $year, 'count' => $count];
        }

        return response()->json($result);
    }


    public function countByExistence()
    {
        $counts = Etablissement::select('exister', DB::raw('count(*) as total'))
            ->groupBy('exister')
            ->get()
            ->map(function($item) {
                return [
                    'status' => $item->exister ? 'Existent' : 'Non-existent',
                    'count' => $item->total
                ];
            });

        return response()->json($counts);
    }

    public function update(Request $request, Etablissement $etablissement)
    {
        $data = $request->validate([
            'Nom' => 'sometimes|string|max:255',
            'Localisation' => 'sometimes|string|max:255',
            'exister' => 'boolean',
            'unité_polluante' => 'sometimes|string|max:255',
            'type_id' => 'sometimes|exists:types,id',
            'ville_id' => 'sometimes|exists:villes,id',
        ]);

        $etablissement->update($data);

        return response()->json($etablissement, 200);
    }

    public function toggleExister(Etablissement $etablissement)
    {
        $etablissement->exister = !$etablissement->exister;
        $etablissement->save();

        return response()->json($etablissement, 200);
    }

    public function index()
    {
        // Eager load clients along with etablissements
        $etablissements = Etablissement::with('clients','ville','type')->get();
        return response()->json($etablissements, 200);
    }


    public function display($city_id)
    {

        // Log city_id to make sure it is being passed correctly
        \Log::info("City ID: " . $city_id);

        if ($city_id == 3) {
            // Fetch establishments for all cities except those with IDs 1 and 2
            $etablissements = Etablissement::whereNotIn('ville_id', [1, 2])->with('clients','ville','type')->get();
        } else {
            // Fetch establishments based on the city ID
            $etablissements = Etablissement::where('ville_id', $city_id)->with('clients','ville','type')->get();
        }

        // Log the result to check if query returned any records
        \Log::info("Etablissements: " . $etablissements->count());

        // Check if there are any establishments
        if ($etablissements->isEmpty()) {
            return response()->json(['message' => 'No establishments found for this city.'], 404);
        }

        // Return the establishments
        return response()->json($etablissements);
    }



    public function countByCity()
    {
        $counts = Etablissement::select('ville_id', DB::raw('count(*) as total'))
            ->groupBy('ville_id')
            ->with('ville')
            ->get()
            ->map(function($item) {
                return [
                    'city' => $item->ville->Nom,
                    'count' => $item->total
                ];
            });

        return response()->json($counts);
    }


    public function show(Etablissement $etablissement)
    {
        $etablissement->load([
            'clients',
            'type',
            'ville',
            'statDeLEtablissement',
            'statDeLEtablissement.resultatDeLab'
        ]);

        return response()->json($etablissement, 200);
    }

    public function delete(Etablissement $etablissement)
    {
        $etablissement->delete();
        return response()->json(['message' => 'Etablissement deleted successfully'], 200);
    }
}
