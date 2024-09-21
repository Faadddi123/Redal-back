<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'Nom_preNom' => 'required|string|max:255',
            'Num_de_Tel' => 'required|string|max:20',
            'Email' => 'required|email|unique:clients,Email',
            'Password' => 'required|string|min:8',
            'Localisation' => 'required|string|max:255',
            'Verifier' => 'boolean',
        ]);

        $client = Client::create($data);

        return response()->json($client, 201);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'Nom_preNom' => 'sometimes|string|max:255',
            'Num_de_Tel' => 'sometimes|string|max:20',
            'Email' => 'sometimes|email|unique:clients,Email,' . $client->id,
            'Password' => 'sometimes|string|min:8',
            'Localisation' => 'sometimes|string|max:255',
            'Verifier' => 'boolean',
        ]);

        $client->update($data);

        return response()->json($client, 200);
    }

    public function verify(Client $client)
    {
        $client->Verifier = true;
        $client->save();

        return response()->json($client, 200);
    }

    public function addEtablissement(Request $request, Client $client)
    {
        $data = $request->validate([
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $client->etablissements()->attach($data['etablissement_id']);

        return response()->json(['message' => 'Etablissement added to client successfully'], 200);
    }

    public function import(Request $request)
    {
        \Log::info('Import route hit');

        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ClientsImport, $request->file('file'));

            return redirect()->back()->with('success', 'Clients imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error importing the clients: ' . $e->getMessage());
        }
    }

    public function index()
    {
        // Eager load the etablissements relationship
        $clients = Client::with('etablissements')->get();
        return response()->json($clients);
    }

    public function show(Client $client)
    {
        // Eager load etablissements along with client
        $client->load('etablissements');
        return response()->json($client, 200);
    }
    
    public function delete(Client $client)
    {
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully'], 200);
    }
}
