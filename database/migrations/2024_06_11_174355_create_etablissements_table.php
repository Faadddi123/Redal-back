<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Localisation');
            $table->boolean('exister');
            $table->string('unité_polluante');
            $table->string('id_type');

            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('ville_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('ville_id')->references('id')->on('villes');
        });
    }


    public function down()
    {
        Schema::dropIfExists('etablissements');
    }
}
;
