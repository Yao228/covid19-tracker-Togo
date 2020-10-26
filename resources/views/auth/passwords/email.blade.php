@extends('layouts.non-auth')

@section('content')
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="/">
                                        {{-- <img src="/assets/images/logo.png" alt="" height="24" /> --}}
                                        <h3 class="d-inline align-middle ml-1 text-logo">COVID-19 Togo</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Modifier votre mot de passe</h6>
                                <p class="text-muted mt-1 mb-5">
                                    Entrez votre adresse e-mail et nous vous enverrons un e-mail avec les instructions pour 
                                    modifier votre mot de passe
                                </p>

                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <form action="{{ route('password.email') }}" method="post" class="authentication-form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label"> Adresse e-mail</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email"
                                                class="form-control @if($errors->has('email')) is-invalid @endif"
                                                id="email" placeholder="Votre adresse e-mail" />

                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Soumettre</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <p class="font-size-24 font-weight-bold text-white mb-1">Ensemble contre COVID-19!</p>
                                        <p class="lead">"Signalez des cas suspects du COVID-19 au Togo!"</i>
                                        </p>
                                        <p>- Docmava</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Revenir à <a href="/" class="text-primary font-weight-bold ml-1">Connexion</a>
                        </p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection