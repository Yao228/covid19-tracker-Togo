@extends('layouts.non-auth')

@section('content')
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 p-5">
                                {{-- <div class="mx-auto mb-5">
                                    <a href="/">
                                     
                                        <h3 class="d-inline align-middle ml-1 text-logo">COVID-19 Togo</h3>
                                    </a>
                                </div> --}}

                                <h6 class="h5 mb-0">Créer votre compte</h6>
                                <p class="text-muted mt-0 mb-4">Créer votre compte maintenant pour aider à mieux utter contre le COVID-19</p>

                                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
                                <br>@endif
                                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>
                                <br>@endif

                                <form method="POST" action="{{ route('register') }}" class="authentication-form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label">Nom*</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="user"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                name="name" value="{{ old('name')}}"
                                                class="form-control @if($errors->has('name')) is-invalid @endif"
                                                id="name" placeholder="Votre nom complet" />

                                            @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <div class="input-group input-group-merge">
                                            <label class="form-control-label">Professionel de santé ?*</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                <input type="radio" class="ml-3 form-check-input @if($errors->has('role')) is-invalid @endif" name="role" value="medecin">Oui
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input @if($errors->has('role')) is-invalid @endif" name="role" value="public">Non
                                                </label>
                                            </div> 
                                            @if($errors->has('role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                            @endif 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Votre centre médical</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="home"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                name="hopital" value="{{ old('hopital')}}"
                                                class="form-control @if($errors->has('hopital')) is-invalid @endif"
                                                id="hospital" placeholder="Le nom de votre centre" />

                                            @if($errors->has('hopital'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('hopital') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Adresse e-mail*</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email"
                                                name="email" value="{{ old('email')}}"
                                                class="form-control @if($errors->has('email')) is-invalid @endif"
                                                id="email" placeholder="Votre adresse e-mail" />

                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="form-control-label">Mot de passe*</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password"
                                                name="password"
                                                class="form-control @if($errors->has('password')) is-invalid @endif"
                                                id="password" placeholder="Entrez votre mot de passe" />

                                            @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="form-control-label">Confirmez votre mot de passe*</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password"
                                                name="confirm_password"
                                                class="form-control @if($errors->has('confirm_password')) is-invalid @endif"
                                                id="confirm_password" placeholder="Confirmez votre mot de passe" />

                                            @if($errors->has('confirm_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Inscrivez-vous</button>
                                    </div>
                                </form>
                                <hr>
                                <div class="col-md-12 text-center">
                                    <p class="text-muted">Vous avez déjà un compte ? <a href="/login"
                                            class="text-primary font-weight-bold ml-1">Connectez-vous</a></p>
                                </div> <!-- end col -->
                            </div>

                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">***Vous n'êtes pas un professionnel de santé***</span>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <a href="/casprobables" class="btn btn-danger">
                                                Déclarer un cas probable de COVID-19 sans s'inscrire
                                            </a>
                                        </div>
                                        <p class="font-size-24 font-weight-bold text-white mb-1">Ensemble contre COVID-19!</p>
                                        <p class="lead">"Signalez des cas suspects du COVID-19 au Togo!"</i>
                                        </p>
                                        <p>-Docmava</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection