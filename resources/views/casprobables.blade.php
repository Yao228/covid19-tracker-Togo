@extends('layouts.non-auth')
@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/smartwizard/smart_wizard_theme_arrows.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 p-5">
                                <h6 class="h5 mb-0">Signaler un cas probable de COVID-19</h6>
                                <p class="text-muted mt-1 mb-4">Veuillez remplir le formulaire ci-dessous pour signaler un cas probale de COVID-19 dans votre localité.</p>
                                  <hr> 
                                  <form action="{{route('casprobables.store')}}" method="POST">
                                      @csrf
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
                                                                    <input type="radio" class="form-check-input" id="Prise_chloroquine_derives1" name="prise_chloroquine_derives" value="Oui">Oui
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" id="Prise_chloroquine_derives2" name="prise_chloroquine_derives" value="Non">Non
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4 class="font-size-15 mt-3">A eu recours à la phytothérapie à base que quinine - Aloma-Nimon-Aloes ?</h4>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" id="Recours_phytotherapie_quinine1" name="recours_phytotherapie_quinine" value="Oui">Oui
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" id="Recours_phytotherapie_quinine2" name="recours_phytotherapie_quinine" value="Non">Non
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
                                                                <button type="submit" id="saveBtn" class="btn btn-primary btn-block">Soumettez les informations</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </form>                           
                            </div>
                           
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

@endsection
@section('script')
<!-- datatable js -->

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/multiselect/multiselect.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
<script src="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

<script type="text/javascript">
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
</script>
<script>
	function flashy(message, link) {
		var template = $($("#flashy-template").html());
		$(".flashy").remove();
		template.find(".flashy__body").html(message).attr("href", link || "#").end()
		 .appendTo("body").hide().fadeIn(300).delay(5000).animate({
			marginRight: "-100%"
		}, 300, "swing", function() {
			$(this).remove();
		});
	}
  </script>
  
  @if(Session::has('flashy_notification.message'))
  <script id="flashy-template" type="text/template">
	<div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
		<a href="#" class="flashy__body" target="_blank"></a>
	</div>
  </script>
  
  <script>
	flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
  </script>
  @endif
  
@include('flashy::message')

@endsection

