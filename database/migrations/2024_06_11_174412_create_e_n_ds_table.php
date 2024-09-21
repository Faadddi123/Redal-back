<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateENDsTable extends Migration
{
    public function up()
    {
        Schema::create('e_n_ds', function (Blueprint $table) {
            $table->id();
            $table->string('Object_de_la_demande');
            $table->string('Nom_du_project');
            $table->string('Adresse_du_project');
            $table->string('Secteur_d_activiter');
            $table->string('Suite_a_donner');
            $table->unsignedBigInteger('etablissement_id');
            $table->timestamps();

            $table->foreign('etablissement_id')->references('id')->on('etablissements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('e_n_ds');
    }
};
