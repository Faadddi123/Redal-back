<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireIndustriesTable extends Migration
{
    public function up()
    {
        Schema::create('questionnaire_industries', function (Blueprint $table) {
            $table->id();
            $table->string('Raison_social');
            $table->string('Adresse');
            $table->string('Tel_Responsable');
            $table->string('Secteur_D_activite');
            $table->string('CIL');
            $table->string('Taille');
            $table->string('Alimentation_en_EP');
            $table->string('Usage_de_eau');
            $table->string('Quantité_EP');
            $table->string('Raccordement_au_réseau_d_assainissement_Redal');
            $table->string('Prétaitement_ou_Trétement_des_EU');
            $table->string('Description_de_système_de_prétaitement_ou_trétement');
            $table->string('Certification');
            $table->string('Type_de_ISO');
            $table->unsignedBigInteger('etablissement_id');
            $table->timestamps();

            $table->foreign('etablissement_id')->references('id')->on('etablissements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questionnaire_industries');
    }
};
