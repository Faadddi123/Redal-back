<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\StatDeLEtablissementController;



Route::post('/clientss', [ClientController::class, 'create']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::patch('/clients/{client}/verify', [ClientController::class, 'verify']);
Route::post('/clients/{client}/etablissements', [ClientController::class, 'addEtablissement']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{client}', [ClientController::class, 'show']);
Route::delete('/clients/{client}', [ClientController::class, 'delete']);
Route::post('/clients/import', [ClientController::class, 'import']);

Route::get('/etablissements/city/{city_id}', [EtablissementController::class, 'display']);
Route::get('/etablissements/count-by-city', [EtablissementController::class, 'countByCity']);
Route::get('/etablissements/count-by-type', [EtablissementController::class, 'countByType']);
Route::get('/etablissements/count-by-existence', [EtablissementController::class, 'countByExistence']);
Route::get('/etablissements/count-by-year', [EtablissementController::class, 'countByYear']);
Route::get('/etablissements/count-by-puits', [EtablissementController::class, 'countByPuits']);
Route::get('/etablissements/count-by-secteur', [EtablissementController::class, 'countBySecteur']);
Route::get('/etablissements/count-by-month', [EtablissementController::class, 'countByMonth']);


Route::post('/etablissements', [EtablissementController::class, 'create']);
Route::put('/etablissements/{etablissement}', [EtablissementController::class, 'update']);
Route::patch('/etablissements/{etablissement}/toggleExister', [EtablissementController::class, 'toggleExister']);
Route::get('/etablissements', [EtablissementController::class, 'index']);
Route::get('/etablissements/{etablissement}', [EtablissementController::class, 'show']);
Route::delete('/etablissements/{etablissement}', [EtablissementController::class, 'delete']);

Route::post('/stats', [StatDeLEtablissementController::class, 'create']);
Route::put('/stats/{stat}', [StatDeLEtablissementController::class, 'update']);
Route::get('/stats', [StatDeLEtablissementController::class, 'index']);
Route::get('/stats/{stat}', [StatDeLEtablissementController::class, 'show']);
Route::delete('/stats/{stat}', [StatDeLEtablissementController::class, 'delete']);
