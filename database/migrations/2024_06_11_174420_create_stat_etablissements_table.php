<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatEtablissementsTable extends Migration
{
    public function up()
    {
        Schema::create('stat_etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('activité');
            $table->string('zone_industrielle');
            $table->string('AEP');
            // $table->string('usage_de_eau');
            $table->string('raccord_de_réseau_ass');
            $table->string('Démarches_REDAL_END');
            $table->text('photos_d_observation');
            $table->unsignedBigInteger('etablissement_id');
            $table->string('Production');
            $table->string('matiere_premiere');
            $table->string('secteur_d_activiter');
            $table->string('RCS');
            $table->longtext('operation_industriel');
            $table->unsignedBigInteger('usage_eau_id');
            $table->unsignedBigInteger('STEP_id');
            $table->boolean('Puits');
            $table->timestamps();

            $table->foreign('etablissement_id')->references('id')->on('etablissements');
            $table->foreign('usage_eau_id')->references('id')->on('usage_eau');
            $table->foreign('STEP_id')->references('id')->on('STEP');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stat_etablissements');
    }
};
