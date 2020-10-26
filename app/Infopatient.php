<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infopatient extends Model
{
    protected $fillable = ['nom_patient', 'sexe', 'age', 'quartier_patient', 'ville_patient', 'region_patient', 'suspect_convid19', 'hta', 'obese',
'oedeme_membre_inferieurs', 'fumeur', 'asthmatique', 'voyage_recent', 'enceinte', 'une_fois_hospitalise', 'tousse',
'difficulte_respiratoire', 'transfert_vers', 'cephalee', 'fatigue', 'duree_symptomes', 'douleurs_musculaires_articulaires', 'prise_chloroquine_derives', 'recours_phytotherapie_quinine', 'autre_traitement', 'latitude', 'longitude', 'atteste_information', 'user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
