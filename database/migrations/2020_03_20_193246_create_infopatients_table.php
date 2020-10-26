<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfopatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infopatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_patient');
            $table->string('sexe');
            $table->string('age');
            $table->string('quartier_patient');
            $table->string('ville_patient');
            $table->string('region_patient');
            $table->string('suspect_convid19');
            $table->string('hta');
            $table->string('obese');
            $table->string('oedeme_membre_inferieurs');
            $table->string('fumeur');
            $table->string('asthmatique');
            $table->string('voyage_recent');
            $table->string('enceinte');
            $table->string('une_fois_hospitalise');
            $table->string('tousse');
            $table->string('difficulte_respiratoire');
            $table->string('transfert_vers');
            $table->string('cephalee');
            $table->string('fatigue');
            $table->string('duree_symptomes');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('atteste_information');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infopatients');
    }
}
