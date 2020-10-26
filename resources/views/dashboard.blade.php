@extends('layouts.vertical')


@section('css')
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Tableau de bord</h4>
    </div>
    <div class="col-sm-8 col-xl-6">
        {{-- <form class="form-inline float-sm-right mt-3 mt-sm-0">
            <div class="form-group mb-sm-0 mr-2">
                <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Télécharger
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                        <span>Envoyer par mail</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimé</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                        <span>Re-Generate</span>
                    </a>
                </div>
            </div>
        </form> --}}
    </div>
</div>
@endsection

@section('content')
@if(auth()->user()->isPublic())
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Bonjour <strong>{{ Auth::user()->name }} </strong>, vous êtes inscrit en tant que <span style="text-transform: capitalize;  font-weight: bold;">{{ Auth::user()->role }} </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <p class=""> 
                    Cette application a pour but d'aider à une meilleure gestion de la crise sanitaire COVID-19 au Togo, en fournissant une évaluation épidémiologique en temps réel et des conseils ciblés à la population.
                    <br>
                        Pour toute information, merci de contacter :   <span class="badge badge-soft-success font-size-15"> Center for Methodology and Modeling  - N°1218/MATDCL Email: c2m@skml.fr </span>
                </p>
                <div class="text-center">
                    <a href="/infopatients" class="btn btn-danger">
                        Déclarer un cas probable de COVID-19
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(!auth()->user()->isPublic())
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Bonjour <strong>{{ Auth::user()->name }} </strong>, vous êtes inscrit en tant que <span style="text-transform: capitalize;  font-weight: bold;">{{ Auth::user()->role }} </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(!auth()->user()->isPublic())
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <h2 class="text-muted text-uppercase font-size-12 font-weight-bold">Transfert CHU</h2>
                        <span class="mb-0 badge badge-soft-warning">{{ $chus->count() }} cas</span>
                    </div>
                    <div class="align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-lg icon-dual-warning"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <h2 class="text-muted text-uppercase font-size-12 font-weight-bold">Transfert clinique</h2>
                        <span class="mb-0 badge badge-soft-info">{{ $cliniques->count() }} cas</span>
                    </div>
                    <div class="align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-lg icon-dual-info"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <h2 class="text-muted text-uppercase font-size-12 font-weight-bold">Transfert domicile</h2>
                        <span class="mb-0 badge badge-soft-success"> {{ $domiciles->count() }} cas</span>
                    </div>
                    <div class="align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-lg icon-dual-success"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <h2 class="text-muted text-uppercase font-size-12 font-weight-bold">Nombre de décès</h2>
                        <span class="mb-0 badge badge-soft-danger">{{ $deces->count() }} cas</span>
                    </div>
                    <div class="align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-lg icon-dual-danger"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- stats + charts -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 mb-0 header-title"> Tous les cas probables signalés <span class="badge badge-soft-primary">{{ $cas_signales->count() }} cas</span> </h3>
                <hr>
                <h5 class="card-title mt-2 mb-2 header-title">Les cas probables signalés sur les 5 derniers jours</h5>
                <div style="width:100%">
                    {!!  $chart->container()  !!}
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
@endif
<!-- row -->

@endsection

@section('script')
<!-- optional plugins -->
<script src="{{ URL::asset('assets/libs/moment/moment.min.js') }}"></script>
@endsection

@section('script-bottom')
<script type="text/javascript" src="{{ asset('assets/js/Chart.min.js') }}"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!} 
@endsection