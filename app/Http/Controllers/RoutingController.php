<?php

namespace App\Http\Controllers;

use App\Infopatient;
use App\Charts\casSignaler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RoutingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        /* Cas total signalé sur les 5 derniers jours*/
        $today_cas = Infopatient::whereDate('created_at', today())->count();
        $yesterday_cas = Infopatient::whereDate('created_at', today()->subDays(1))->count();
        $cas_2_days_ago = Infopatient::whereDate('created_at', today()->subDays(2))->count();
        $cas_3_days_ago = Infopatient::whereDate('created_at', today()->subDays(3))->count();
        $cas_4_days_ago = Infopatient::whereDate('created_at', today()->subDays(4))->count();

         /* Cas transféré vers domicile sur les 5 derniers jours*/
        $today_domiciles = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->whereDate('created_at', today())->count();
        $yesterday_domiciles = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->whereDate('created_at', today()->subDays(1))->count();
        $domiciles_2_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->whereDate('created_at', today()->subDays(2))->count();
        $domiciles_3_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->whereDate('created_at', today()->subDays(3))->count();
        $domiciles_4_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->whereDate('created_at', today()->subDays(4))->count();

         /* Cas transféré vers CHU sur les 5 derniers jours*/
         $today_chus = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->whereDate('created_at', today())->count();
         $yesterday_chus = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->whereDate('created_at', today()->subDays(1))->count();
         $chus_2_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->whereDate('created_at', today()->subDays(2))->count();
         $chus_3_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->whereDate('created_at', today()->subDays(3))->count();
         $chus_4_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->whereDate('created_at', today()->subDays(4))->count();

        /* Cas transféré vers Clinique sur les 5 derniers jours*/
        $today_cliniques = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->whereDate('created_at', today())->count();
        $yesterday_cliniques = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->whereDate('created_at', today()->subDays(1))->count();
        $cliniques_2_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->whereDate('created_at', today()->subDays(2))->count();
        $cliniques_3_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->whereDate('created_at', today()->subDays(3))->count();
        $cliniques_4_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->whereDate('created_at', today()->subDays(4))->count();

        /* Cas de décès sur les 5 derniers jours*/
        $today_deces = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->whereDate('created_at', today())->count();
        $yesterday_deces = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->whereDate('created_at', today()->subDays(1))->count();
        $deces_2_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->whereDate('created_at', today()->subDays(2))->count();
        $deces_3_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->whereDate('created_at', today()->subDays(3))->count();
        $deces_4_days_ago = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->whereDate('created_at', today()->subDays(4))->count();

        $chart = new casSignaler;
        $chart->labels(['il y a 4 jours','il y a 3 jours','il y a 2 jours', 'Hier', 'Aujourdhui']);
        $chart->dataset('Tous les cas signalés', 'line', [$cas_4_days_ago,$cas_3_days_ago,$cas_2_days_ago, $yesterday_cas, $today_cas]);
        $chart->dataset('Cas transférés vers domicile', 'line', [$domiciles_4_days_ago,$domiciles_3_days_ago,$domiciles_2_days_ago, $yesterday_domiciles, $today_domiciles])->options([
            'color' => '#43d39e',
            'fill' => false,
            'backgroundColor' => '#43d39e',
        ]);
        $chart->dataset('Cas transférés vers CHU', 'line', [$chus_4_days_ago,$chus_3_days_ago,$chus_2_days_ago, $yesterday_chus, $today_chus])->options([
            'color' => '#ffbe0b',
            'fill' => false,
            'backgroundColor' => '#ffbe0b',
        ]);
        $chart->dataset('Cas transférés vers Clinique', 'line', [$cliniques_4_days_ago,$cliniques_3_days_ago,$cliniques_2_days_ago, $yesterday_cliniques, $today_cliniques])->options([
            'color' => '#25c2e3',
            'fill' => false,
            'backgroundColor' => '#25c2e3',
        ]);
        $chart->dataset('Cas de décès', 'line', [$deces_4_days_ago,$deces_3_days_ago,$deces_2_days_ago, $yesterday_deces, $today_deces])->options([
            'color' => '#ff5c75',
            'fill' => false,
            'backgroundColor' => '#ff5c75',
        ]);

        $domiciles = DB::table('infopatients')->where('transfert_vers', '=', 'Domicile')->get();
        $chus = DB::table('infopatients')->where('transfert_vers', '=', 'CHU')->get();
        $cliniques = DB::table('infopatients')->where('transfert_vers', '=', 'Clinique')->get();
        $deces = DB::table('infopatients')->where('transfert_vers', '=', 'Décès')->get();
        
        $cas_signales = Infopatient::all();

        return view('dashboard')->with('domiciles', $domiciles)
                                ->with('chus', $chus)
                                ->with('cliniques', $cliniques)
                                ->with('deces', $deces)
                                ->with('chart', $chart)
                                ->with('cas_signales', $cas_signales);
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
        //
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
