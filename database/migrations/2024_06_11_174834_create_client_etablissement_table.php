<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEtablissementTable extends Migration
{
    public function up()
    {
        Schema::create('client_etablissement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('etablissement_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_etablissement');
    }
};
