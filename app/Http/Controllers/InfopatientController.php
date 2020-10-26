<?php

namespace App\Http\Controllers;

use App\Infopatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DataTables;

class InfopatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Infopatient::latest()->get();
            if(!Auth::user()->isAdmin()){
                $data=$data->where('user_id', Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Modifier" class="edit btn btn-primary btn-sm editPatient">Modifier</a> | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Détails" id="showPatient" class="edit btn btn-success btn-sm showPatient">Détails</a> | ';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Suprimer" class="btn btn-danger btn-sm deletePatient">Suprimer</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('infopatients',compact('infopatients'));
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

        Infopatient::updateOrCreate(
        ['id' => $request->patient_id],
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
            'user_id' => Auth::user()->id

        ]);        
   
        return response()->json(['success'=>'Informations sauvegardées avec succès.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infopatient = Infopatient::find($id);
        return response()->json($infopatient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infopatient = Infopatient::find($id);
        return response()->json($infopatient);
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
        Infopatient::find($id)->delete();
     
        return response()->json(['success'=>'Information supprimé avec succès.']);
    }
}
