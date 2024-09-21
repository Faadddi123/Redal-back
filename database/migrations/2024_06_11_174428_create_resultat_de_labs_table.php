<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatDeLabsTable extends Migration
{
    public function up()
    {
        Schema::create('resultat_de_labs', function (Blueprint $table) {
            $table->id();
            $table->float('PH');
            $table->float('Temp_Air');
            $table->float('Temp_Eau');
            $table->float('Conductivité_à_μs_cm_20_C');
            $table->float('Conductivité_à_μs_cm_25_C');
            $table->float('Salinité_g_par_L');
            $table->float('Turbidité_NTU');
            $table->float('DCO_mgO2_par_L');
            $table->float('DBO5_mgO2_par_L');
            $table->float('MES_mg_par_L');
            $table->float('Na_mg_par_L');
            $table->float('Cl-_mg_par_L');
            $table->float('NO3-_mg_par_L');
            $table->float('Phénols_mg_par_L');
            $table->float('CN-_mg_par_L');
            $table->float('SO42-_mg_par_L');
            $table->float('As_mg_par_L');
            $table->float('Cd_mg_par_L');
            $table->float('Cr_mg_par_L');
            $table->float('Cu_mg_par_L');
            $table->float('Pb_mg_par_L');
            $table->float('Fe_mg_par_L');
            $table->float('Ni_mg_par_L');
            $table->float('Sn_mg_par_L');
            $table->float('Zn_mg_par_L');
            $table->float('Hg_mg_par_L');
            $table->unsignedBigInteger('stat_etablissement_id');
            $table->timestamps();

            $table->foreign('stat_etablissement_id')->references('id')->on('stat_etablissements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultat_de_labs');
    }
};
