<?php

namespace App\Http\Controllers;

use App\Infopatient;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class casProbableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/casprobables');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sexe' => 'required',
            'age' => 'required',
            'quartier_patient' => 'required',
            'ville_patient' => 'required',
            'region_patient' => 'required',
            'suspect_convid19' => 'required',
            'hta' => 'required',
            'obese' => 'required',
            'oedeme_membre_inferieurs' => 'required',
            'fumeur' => 'required',
            'asthmatique' => 'required',
            'voyage_recent' => 'required',
            'enceinte' => 'required',
            'une_fois_hospitalise' => 'required',
            'tousse' => 'required',
            'difficulte_respiratoire' => 'required',
            'transfert_vers' => 'required',
            'cephalee' => 'required',
            'fatigue' => 'required',
            'duree_symptomes' => 'required',
            'douleurs_musculaires_articulaires'=> 'required',
            'prise_chloroquine_derives'=> 'required',
            'recours_phytotherapie_quinine'=> 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'atteste_information' => 'required',

        ]);

        Infopatient::create(
        [
            'sexe' => $request->sexe,
            'age' => $request->age,
            'quartier_patient' => $request->quartier_patient,
            'ville_patient' => $request->ville_patient,
            'region_patient' => $request->region_patient,
            'suspect_convid19' => $request->suspect_convid19,
            'hta' => $request->hta,
            'obese' => $request->obese,
            'oedeme_membre_inferieurs' => $request->oedeme_membre_inferieurs,
            'fumeur' => $request->fumeur,
            'asthmatique' => $request->asthmatique,
            'voyage_recent' => $request->voyage_recent,
            'enceinte' => $request->enceinte,
            'une_fois_hospitalise' => $request->une_fois_hospitalise,
            'tousse' => $request->tousse,
            'difficulte_respiratoire' => $request->difficulte_respiratoire,
            'transfert_vers' => $request->transfert_vers,
            'cephalee' => $request->cephalee,
            'fatigue' => $request->fatigue,
            'duree_symptomes' => $request->duree_symptomes,
            'douleurs_musculaires_articulaires'=> $request->douleurs_musculaires_articulaires,
            'prise_chloroquine_derives'=> $request->prise_chloroquine_derives,
            'recours_phytotherapie_quinine'=> $request->recours_phytotherapie_quinine,
            'autre_traitement'=> $request->autre_traitement,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'atteste_information' => $request->atteste_information,

        ]);        
   
        Flashy::success('Merci pour votre contribution !Luttons ensemble contre le COVID-19.');
         
        return redirect(route('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
