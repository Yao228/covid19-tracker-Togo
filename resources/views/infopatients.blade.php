@extends('layouts.vertical')


@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/smartwizard/smart_wizard_theme_arrows.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
{{--   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">COVID19 TOGO</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cas suspects</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
        <div class="col-12">
            <div class="row page-title align-items-center">
                <div class="col-sm-9 col-xl-9">
                    <h4 class="mb-1 mt-0">Liste des cas probables</h4>
                </div>
                <div class="col-sm-3 col-xl-3">
                   <!-- Large modal -->
                   <button type="button" id="addNewPatient"  class="btn btn-primary btn-block" data-toggle="modal" data-target="#bs-example-modal-lg">Signaler un cas probable</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
    
                    <table class="table table-striped dt-responsive nowrap data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sexe</th>
                                <th>Age</th>
                                <th>Quartier d'habitation</th>
                                <th>Suspect COVID-19</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <!--  Modal content for the above example -->
<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="patientForm" name="patientForm">
                    <input type="hidden" name="patient_id" id="patient_id">
                        <div id="smartwizard-arrows">
                            <ul>
                                <li><a href="#sw-arrows-step-1">Patient<small class="d-block">Identité du patient</small></a></li>
                                <li><a href="#sw-arrows-step-2">Suspect COVID-19<small class="d-block">Information relative au COVID 19</small></a></li>
                                <li><a href="#sw-arrows-step-3">Soumettre<small class="d-block">Soumettez les informations</small></a></li>
                            </ul>
                                <div class="p-3">
                                    <div id="sw-arrows-step-1">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Tous les champs sont obligatoires
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sexe">Sexe</label>
                                                    <select class="custom-select mb-2" name="sexe" id="sexe">
                                                        <option selected="">Choisisser le sexe </option>
                                                        <option value="Homme">Homme</option>
                                                        <option value="Femme">Femme</option>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <select class="custom-select mb-2" id="age" name="age">
                                                        <option selected="">Interval d'âge</option>
                                                        <option value="0-10">0-10</option>
                                                        <option value="0-10">20-30</option>
                                                        <option value="0-10">30-40</option>
                                                        <option value="0-10">40-50</option>
                                                        <option value="0-10">50-60</option>
                                                        <option value="0-10">60-70</option>
                                                        <option value="0-10">70-80</option>
                                                        <option value="0-10">80-90</option>
                                                        <option value="0-10">90-100</option>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sw-arrows-patientHabitation">Quartier d'habitation </label>
                                                    <select data-plugin="customselect" class="form-control" name="quartier_patient" id="quartier_patient" data-placeholder="Choisissez le quartier d'habitation">
                                                        <option></option>
                                                        <option value="[ABK] Abobokomé">Abobokomé</option>
                                                        <option value="[ADT] Adawlato">Adawlato</option>
                                                        <option value="[ADK] Adoboukomé">Adoboukomé</option>
                                                        <option value="[AGH] Agbadahonou">Agbadahonou</option>
                                                        <option value="[AGK] Aguia-Komé">Aguia-Komé</option>
                                                        <option value="[BNG] Béniglato">Béniglato</option>
                                                        <option value="[FRJ] Fréau-Jardin">Fréau-Jardin</option>
                                                        <option value="[KTM] Kokétimé">Kokétimé</option>
                                                        <option value="[QAD] Quartier Administratif">Quartier Administratif</option>
                                                        <option value="[SGR] Sanguéra">Sanguéra</option>
                                                        <option value="Wétrivi-Kondji">Wétrivi-Kondji</option>
                                                        <option value="[ADA] Adakpamé">Adakpamé</option>
                                                        <option value="[AKN] Akodesséma-Kponou">Akodesséma-Kponou</option>
                                                        <option value="[AKT] Akodesséma-Kpota">Akodesséma-Kpota</option>
                                                        <option value="[AFM] Anfamé">Anfamé</option>
                                                        <option value="[ATG] Attiégou">Attiégou</option>
                                                        <option value="[BKP] Bè-Kpota">Bè-Kpota</option>
                                                        <option value="[HDN] Hédzranawoé">Hédzranawoé</option>
                                                        <option value="[KGK] Kagnikopé">Kagnikopé</option>
                                                        <option value="[KGG] Kélégougan">Kélégougan</option>
                                                        <option value="[LO2] Lomé-2">Lomé-2</option>
                                                        <option value="[NFK] N'tifafakomé">N'tifafakomé</option>
                                                        <option value="[RB] Résidence du Bénin">Résidence du Bénin</option>
                                                        <option value="[SJO] Saint-Joseph">Saint-Joseph</option>
                                                        <option value="[TKA] Tokoin-Aéroport">Tokoin-Aéroport</option>
                                                        <option value="[TKF] Tokoin-Forever">Tokoin-Forever</option>
                                                        <option value="[TKN] Tokoin-N'kafu">okoin-N'kafu</option>
                                                        <option value="[TKT] Tokoin-Tamé">Tokoin-Tamé</option>
                                                        <option value="[TKW] Tokoin-Wuiti">Tokoin-Wuiti</option>
                                                        <option value="[ABG] Ablogamé">Ablogamé</option>
                                                        <option value="[AKS] Akodésséwa">Akodésséwa</option>
                                                        <option value="[AMT] Amoutivé">Amoutivé</option>
                                                        <option value="[ATN] Antonio-Nétimé">Antonio-Nétimé</option>
                                                        <option value="[BSJ] Bassadji">Bassadji</option>
                                                        <option value="[BE] Bè">Bè</option>
                                                        <option value="[BAH] Bè-Ahligo">Bè-Ahligo</option>
                                                        <option value="[BAP] Bé-Apéhémé">Bé-Apéhémé</option>
                                                        <option value="[BHE] Bè-Hédjé">Bè-Hédjé</option>
                                                        <option value="[DLS] Doulassamé">Doulassamé</option>
                                                        <option value="[GBY] Gbényédji">Gbényédji</option>
                                                        <option value="[KTK] Kotokou-Kondji">Kotokou-Kondji</option>
                                                        <option value="[KPH] Kpéhénou">Kpéhénou</option>
                                                        <option value="[LNV] Lom Nava">Lom Nava</option>
                                                        <option value="[SZN] Souza-Nétimé">Souza-Nétimé</option>
                                                        <option value="[WET] Wété">Wété</option>
                                                        <option value="[POR] Zone Portuaire">Zone Portuaire</option>
                                                        <option value="[HNK] Hanoukopé">Hanoukopé</option>
                                                        <option value="[KOD] Kodjoviakopé">Kodjoviakopé</option>
                                                        <option value="[NYK] Nyékonakpoé">Nyékonakpoé</option>
                                                        <option value="[OTN] Octaviano-Nétimé">Octaviano-Nétimé</option>
                                                        <option value="[ABV] Abové">Abové</option>
                                                        <option value="[AFG] Aflao Gakli">Aflao Gakli</option>
                                                        <option value="[AGP] Agbalédépogan">Agbalédépogan</option>
                                                        <option value="[AKO] Akossombo">Akossombo</option>
                                                        <option value="[AVN] Avénou">Avénou</option>
                                                        <option value="[BKK] Bè-Klikamé">Bè-Klikamé</option>
                                                        <option value="[CSB] Cassablanca">Cassablanca</option>
                                                        <option value="[DGV] Dogbéavou">Dogbéavou</option>
                                                        <option value="[DMS] Doumasséssé">Doumasséssé</option>
                                                        <option value="[GBV] Gbonvié">Gbonvié</option>
                                                        <option value="[SOV] Soviépié">Soviépié</option>
                                                        <option value="[TKE] Tokoin-Élévagnon">Tokoin-Élévagnon</option>
                                                        <option value="[TKG] Tokoin-Gbadago">Tokoin-Gbadago</option>
                                                        <option value="[TKH] Tokoin-Hôpital">Tokoin-Hôpital</option>
                                                        <option value="[TKL] Tokoin-Lycée">Tokoin-Lycée</option>
                                                        <option value="[TKO] Tokoin-Ouest">Tokoin-Ouest</option>
                                                        <option value="[TKS] Tokoin-Solidarité">Tokoin-Solidarité</option>
                                                        <option value="[TOT] Totsi">Totsi</option>
                                                        <option value="[UB] Université du Bénin">Université du Bénin</option>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sw-arrows-patientVille">Ville</label>
                                                    <select data-plugin="customselect" class="form-control" name="ville_patient" id="ville_patient" data-placeholder="Choisissez le quartier d'habitation">
                                                        <option></option>
                                                        <option value="Kévé (Avé)">Kévé (Avé)</option>
                                                        <option value="Afagnagan (Bas-Mono)">Afagnagan (Bas-Mono)</option>
                                                        <option value="Lomé-Agoe (Golfe-Agoe)">Lomé-Agoe (Golfe-Agoe)</option>
                                                        <option value="Aneho (Lacs)">Aneho (Lacs)</option>
                                                        <option value="Vogan (Vo)">Vogan (Vo)</option>
                                                        <option value="Tabligbo (Yoto)">Tabligbo (Yoto)</option>
                                                        <option value="Tsévié (Zio)">Tsévié (Zio)</option>
                                                        <option value="Atakpamé (Ogou)">Atakpamé (Ogou)</option>
                                                        <option value="Elavagnon (Est-Mono) ">Elavagnon (Est-Mono)</option>
                                                        <option value="Amlamé (Amou)">Amlamé (Amou)</option>
                                                        <option value="Badou (Wawa)">Badou (Wawa)</option>
                                                        <option value="Agou Ciadjé-pè (Agou)">Agou Ciadjé-pè (Agou)</option>
                                                        <option value="Notsé (Haho)">Notsé (Haho)</option>
                                                        <option value="Tohoun (Moyen-Mono)">Tohoun (Moyen-Mono)</option>
                                                        <option value="Danyi Ajeyeme (Dayes) ">Danyi Ajeyeme (Dayes)</option>
                                                        <option value="Kpalimé (Kloto)">Kpalimé (Kloto)</option>
                                                        <option value="Kougnokou (Akébou)">Kougnokou (Akébou)</option>
                                                        <option value="Akata (Akata)">Akata (Akata)</option>
                                                        <option value="Anié (Anié)">Anié (Anié)</option>
                                                        <option value="Blitta (Blitta)">Blitta (Blitta)</option>
                                                        <option value="Sotouboua (Sotouboua)">Sotouboua (Sotouboua)</option>
                                                        <option value="Tchamba (Tchamba)">Tchamba (Tchamba)</option>
                                                        <option value="Sokodé (Tchaoudjo)">Sokodé (Tchaoudjo)</option>
                                                        <option value="Djarkpenga (Mo)">Djarkpenga (Mo)</option>
                                                        <option value="Kara (Kozah)">Kara (Kozah)</option>
                                                        <option value="Bafilo (Assoli)">Bafilo (Assoli)</option>
                                                        <option value="Bassar (Bassar)">Bassar (Bassar)</option>
                                                        <option value="Pagouda (Binah)">Pagouda (Binah)</option>
                                                        <option value="Guérin-Kouka (Dankpen)">Guérin-Kouka (Dankpen)</option>
                                                        <option value="Niamtougou (Doufelgou) ">Niamtougou (Doufelgou) </option>
                                                        <option value="Kanté (Kéran)">Kanté (Kéran)</option>
                                                        <option value="Mandouri (Kpendjal)">Mandouri (Kpendjal)</option>
                                                        <option value="Mango (Oti)">Mango (Oti)</option>
                                                        <option value="Tandjouaré (Tandjouaré)">Tandjouaré (Tandjouaré)</option>
                                                        <option value="Dapaong (Tone)">Dapaong (Tone)</option>
                                                        <option value="Cinkassé (Cinkassé) ">Cinkassé (Cinkassé)</option>
                                                        <option value="Gando (Oti-Sud)">Gando (Oti-Sud)</option>
                                                        <option value="Naki-Est (Kpendjal-Ouest)">Naki-Est (Kpendjal-Ouest)</option>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sw-arrows-sexe">Région</label>
                                                    <select class="custom-select mb-2" name="region_patient" id="region_patient">
                                                        <option selected="">Région du patient</option>
                                                        <option value="Maritime">Maritime</option>
                                                        <option value="Plateaux">Plateaux</option>
                                                        <option value="Centrale">Centrale</option>
                                                        <option value="Kara">Kara</option>
                                                        <option value="Savane">Savane</option>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" id="latitude" name="latitude" class="form-control" value="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" id="longitude" name="longitude" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="sw-arrows-step-2">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Toutes les questions sont obligatoires . Seul le champ <strong>Autre traitement</strong>  est optionnel.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Suspect COVID ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="suspect_convid19" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="suspect_convid19" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">HTA ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="hta" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="hta" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Obese ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="obese" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="obese" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Oedeme des membres inférieurs? </h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="oedeme_membre_inferieurs" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="oedeme_membre_inferieurs" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Fumeur ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="fumeur" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="fumeur" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Asthmatique ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="asthmatique" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="asthmatique" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Voyage récent ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="voyage_recent" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="voyage_recent" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Enceinte ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="enceinte" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="enceinte" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Déjà hospitalisé par le passé ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="une_fois_hospitalise" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="une_fois_hospitalise" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Tousse ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tousse" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="tousse" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Difficulté respiratoire ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="difficulte_respiratoire" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="difficulte_respiratoire" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Transfert vers</h4>
                                                <div class="form-check-inline">
                                                    <select class="custom-select mb-2" name="transfert_vers" id="transfert_vers">
                                                        <option selected="">Transfert vers</option>
                                                        <option value="Domicile">Domicile</option>
                                                        <option value="CHU">CHU</option>
                                                        <option value="Clinique">Clinique</option>
                                                        <option value="Décès">Décès</option>
                                                    </select>
                                                </div>    
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Céphalées ? </h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="cephalee" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="cephalee" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Fatigue ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="fatigue" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="fatigue" value="Non">Non
                                                    </label>
                                                </div>     
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Symptomes depuis</h4>
                                                <div class="form-check-inline">
                                                    <select class="custom-select mb-2"  name="duree_symptomes" id="duree_symptomes">
                                                        <option selected="">Symptomes depuis</option>
                                                        <option value="1 jour">1 jour</option>
                                                        <option value="2 jours">2 jours</option>
                                                        <option value="3 jours">3 jours</option>
                                                        <option value="4 jours">4 jours</option>
                                                        <option value="5 jours">5 jours</option>
                                                        <option value="6 jours">6 jours</option>
                                                        <option value="7 jours">7 jours</option>
                                                        <option value="8 jours">8 jours</option>
                                                        <option value="9 jours">9 jours</option>
                                                        <option value="10 jours">10 jours</option>
                                                        <option value="11 jours">11 jours</option>
                                                        <option value="12 jours">12 jours</option>
                                                        <option value="13 jours">13 jours</option>
                                                        <option value="14 jours">14 jours</option>
                                                        <option value="15 jours et plus">15 jours et plus</option>
                                                    </select>
                                                </div>    
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">Douleurs musculaires ou articulaires </h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Douleurs_musculaires_articulaires1" name="douleurs_musculaires_articulaires" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Douleurs_musculaires_articulaires2" name="douleurs_musculaires_articulaires" value="Non">Non
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">A pris de la chloroquine ou ses dérivés ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Prise_chloroquine_derives" name="prise_chloroquine_derives" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Prise_chloroquine_derives" name="prise_chloroquine_derives" value="Non">Non
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="font-size-15 mt-3">A eu recours à la phytothérapie à base que quinine - Aloma-Nimon-Aloes ?</h4>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Recours_phytotherapie_quinine" name="recours_phytotherapie_quinine" value="Oui">Oui
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="Recours_phytotherapie_quinine" name="recours_phytotherapie_quinine" value="Non">Non
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="sw-arrows-patientVille">Autre traitement</label>
                                                    <textarea class="form-control" rows="3" cols="100%" id="autre_traitement" name="autre_traitement"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div id="sw-arrows-step-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <div class="mb-3">
                                                        <i class="uil uil-check-square text-success h2"></i>
                                                    </div>
                                                    <h3>Vous y êtes !</h3>

                                                    <div class="mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="form-check-input" name="atteste_information" value="Oui" id="atteste_information" required>
                                                            <label class="form-check-label" for="exampleCheck1">J'aide à sauver des vies. J'atteste que les informations sont fiables.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" id="saveBtn" value="create" class="btn btn-primary btn-block">Soumettez les informations</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  Modal content for the above example -->
<div class="modal fade" id="modalPatient" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Informations détaillée du patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>Sexe : <span class="badge badge-soft-primary" id="Sexe"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Age : <span class="badge badge-soft-primary" id="Age"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Quartier : <span class="badge badge-soft-primary" id="Quartierpatient"></span></p>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <p>Ville : <span class="badge badge-soft-primary" id="Villepatient"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Région : <span class="badge badge-soft-primary" id="Regionpatient"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Suspect COVID : <span class="badge badge-soft-primary" id="Suspectconvid19"></span></p>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <p>HTA : <span class="badge badge-soft-primary" id="Hta"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Obese : <span class="badge badge-soft-primary" id="Obese"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Oedeme des membres inférieurs : <span class="badge badge-soft-primary" id="OedemeMembreInferieurs"></span></p>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <p>Fumeur : <span class="badge badge-soft-primary" id="Fumeur"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Asthmatique : <span class="badge badge-soft-primary" id="Asthmatique"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Voyage récent : <span class="badge badge-soft-primary" id="Voyagerecent"></span></p>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <p>Enceinte : <span class="badge badge-soft-primary" id="Enceinte"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Déjà hospitalisé par le passé : <span class="badge badge-soft-primary" id="UnefoisHospitalise"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Tousse : <span class="badge badge-soft-primary" id="Tousse"></span></p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <p>Difficulté respiratoire : <span class="badge badge-soft-primary" id="Difficulte_respiratoire"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Transfert vers : <span class="badge badge-soft-primary" id="Transfert_vers"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Céphalées : <span class="badge badge-soft-primary" id="Cephalee"></span></p>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <p>Symptomes depuis : <span class="badge badge-soft-primary" id="Fatigue"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Fatigue : <span class="badge badge-soft-primary" id="Dureesymptomes"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Douleurs musculaires ou articulaires : <span class="badge badge-soft-primary" id="DouleursMusculairesArticulaires"></span></p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <p>A pris de la chloroquine ou ses dérivés : <span class="badge badge-soft-primary" id="PriseChloroquineDerives"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>A eu recours à la phytothérapie à base que quinine - Aloma-Nimon-Aloes : <span class="badge badge-soft-primary" id="RecoursPhytotherapieQuinine"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5>Autre traitement</h5>
                        <p id="AutreTraitement"></p>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('script')
<!-- datatable js -->
{{-- <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script> --}}

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/multiselect/multiselect.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
{{-- <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>--}}
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

<script type="text/javascript">
        $(function () {
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              language: {
                    "url": "{{ URL::asset('assets/i18n/French.json') }}"
                },
              ajax: "{{ route('infopatients.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'sexe', name: 'sexe'},
                  {data: 'age', name: 'age'},
                  {data: 'quartier_patient', name: 'quartier_patient'},
                  {data: 'suspect_convid19', name: 'suspect_convid19'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          }); 

           
          $('#addNewPatient').click(function () {
              $('#saveBtn').val("create-patient");
              $('#patient_id').val('');
              $('#patientForm').trigger("reset");
              $('#modelHeading').html("Ajouter un nouveau cas");
              $('#ajaxModel').modal('show');

              if ("geolocation" in navigator) {
                /* la géolocalisation est disponible */
                console.log("Géolocalisation disponible");

                navigator.geolocation.getCurrentPosition(position => {

                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                });
                    //console.log(lat, lon);
                } else {
                /* la géolocalisation n'est pas disponible */
                console.log("Géolocalisation non disponible");
                }
            });

          $('body').on('click', '.showPatient', function () {
            var patient_id = $(this).data('id');
            $.get("{{ route('infopatients.index') }}" +'/' + patient_id, function (data) {
                $('#modalPatient').modal('show');
                $('#Sexe').html(data.sexe);
                $('#Age').html(data.age);
                $('#Quartierpatient').html(data.quartier_patient);
                $('#Villepatient').html(data.ville_patient);
                $('#Regionpatient').html(data.region_patient);
                $('#Suspectconvid19').html(data.suspect_convid19);
                $('#Hta').html(data.hta);
                $('#Obese').html(data.obese);
                $('#OedemeMembreInferieurs').html(data.oedeme_membre_inferieurs);
                $('#Fumeur').html(data.fumeur);
                $('#Asthmatique').html(data.asthmatique);
                $('#Voyagerecent').html(data.voyage_recent);
                $('#Enceinte').html(data.enceinte);
                $('#UnefoisHospitalise').html(data.une_fois_hospitalise);
                $('#Tousse').html(data.tousse);
                $('#Difficulte_respiratoire').html(data.difficulte_respiratoire);
                $('#Transfert_vers').html(data.transfert_vers);
                $('#Cephalee').html(data.cephalee);
                $('#Fatigue').html(data.fatigue);
                $('#Dureesymptomes').html(data.duree_symptomes);
                $('#DouleursMusculairesArticulaires').html(data.douleurs_musculaires_articulaires);
                $('#PriseChloroquineDerives').html(data.prise_chloroquine_derives);
                $('#RecoursPhytotherapieQuinine').html(data.recours_phytotherapie_quinine);
                $('#AutreTraitement').html(data.autre_traitement);
                $('#Latitude').html(data.latitude);
                $('#Longitude').html(data.longitude);
                $('#atteste_information').html(data.atteste_information);
             })
          });
          
          $('body').on('click', '.editPatient', function () {
            var patient_id = $(this).data('id');
            $.get("{{ route('infopatients.index') }}" +'/' + patient_id +'/edit', function (data) {
                $('#modelHeading').html("Modifier ce cas");
                $('#saveBtn').val("edit-patient");
                $('#ajaxModel').modal('show');
                $('#patient_id').val(data.id);
                $('#sexe').val(data.sexe);
                $('#age').val(data.age);
                $('#quartier_patient').val(data.quartier_patient);
                $('#ville_patient').val(data.ville_patient);
                $('#region_patient').val(data.region_patient);
                $("input[name=suspect_convid19][value=" + data.suspect_convid19 + "]").prop('checked', true);
                $("input[name=hta][value=" + data.hta + "]").prop('checked', true);
                $("input[name=obese][value=" + data.obese + "]").prop('checked', true);
                $("input[name=oedeme_membre_inferieurs][value=" + data.oedeme_membre_inferieurs + "]").prop('checked', true);
                $("input[name=fumeur][value=" + data.fumeur + "]").prop('checked', true);
                $("input[name=asthmatique][value=" + data.asthmatique + "]").prop('checked', true);
                $("input[name=voyage_recent][value=" + data.voyage_recent + "]").prop('checked', true);
                $("input[name=enceinte][value=" + data.enceinte + "]").prop('checked', true);
                $("input[name=une_fois_hospitalise][value=" + data.une_fois_hospitalise + "]").prop('checked', true);
                $("input[name=tousse][value=" + data.tousse + "]").prop('checked', true);
                $("input[name=difficulte_respiratoire][value=" + data.difficulte_respiratoire + "]").prop('checked', true);
                $('#transfert_vers').val(data.transfert_vers);
                $("input[name=cephalee][value=" + data.cephalee + "]").prop('checked', true);
                $("input[name=fatigue][value=" + data.fatigue + "]").prop('checked', true);
                $('#duree_symptomes').val(data.duree_symptomes);
                $("input[name=douleurs_musculaires_articulaires][value=" + data.douleurs_musculaires_articulaires + "]").prop('checked', true);
                $("input[name=prise_chloroquine_derives][value=" + data.prise_chloroquine_derives + "]").prop('checked', true);
                $("input[name=recours_phytotherapie_quinine][value=" + data.recours_phytotherapie_quinine + "]").prop('checked', true);
                $('#autre_traitement').val(data.autre_traitement);
                $('#latitude').val(data.latitude);
                $('#longitude').val(data.longitude);
                $('#atteste_information').prop("checked", true);
            })
         });
          
          $('#saveBtn').click(function (e) {
              e.preventDefault();
              $(this).html('Envoi...');
          
              $.ajax({
                data: $('#patientForm').serialize(),
                url: "{{ route('infopatients.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
           
                    $('#patientForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
               
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Sauvegarder les modifications');
                }
            });
          });
          
          $('body').on('click', '.deletePatient', function () {
           
              var patient_id = $(this).data("id");
              confirm("Voulez-vous vraiment supprimer !");
            
              $.ajax({
                  type: "DELETE",
                  url: "{{ route('infopatients.store') }}"+'/'+patient_id,
                  success: function (data) {
                      table.draw();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          });
           
        });
      </script>
@endsection

