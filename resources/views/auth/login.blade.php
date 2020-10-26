@extends('layouts.non-auth')

@section('content')

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                {{-- <div class="mx-auto mb-5">
                                    <a href="/">
                                       
                                        <h3 class="d-inline align-middle ml-1 text-logo">COVID-19 Togo</h3>
                                    </a>
                                </div> --}}

                                <h6 class="h5 mb-0">Bienvenue!</h6>
                                <p class="text-muted mt-1 mb-4">Entrez votre E-mail et votre mot de passe pour vous connecter.</p>

                                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
                                <br>@endif
                                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>
                                <br>@endif

                                <form action="{{ route('login') }}" method="post" class="authentication-form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label">Adresse E-mail</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email"
                                                class="form-control @if($errors->has('email')) is-invalid @endif" id="
                                                email" placeholder="Votre adresse e-mail" name="email" value="{{ old('email')}}" />

                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Mot de passe</label>
                                        <a href="{{ route('password.request') }}"
                                            class="float-right text-muted text-unline-dashed ml-1">Mot de passe oublié?</a>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password"
                                                placeholder="Entrez votre mot de passe"  name="password" />

                                            @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                                {{ old('remember') ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="checkbox-signin">Se souvenir de moi</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Connexion
                                        </button>
                                    </div>
                                </form>
                                <hr>
                               
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="text-muted">Vous n'êtes pas encore inscrit ? <a href="/register"
                                                class="text-primary font-weight-bold ml-1">S'inscrire</a></p>
                                    </div> <!-- end col -->
                                </div> 
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">***Vous n'êtes pas un professionnel de santé***</span>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="/casprobables" class="btn btn-danger">
                                                Déclarer un cas probable de COVID-19 sans s'inscrire
                                            </a>
                                        </div>
                                        <p class="font-size-24 font-weight-bold text-white mb-1">Ensemble contre COVID-19!</p>
                                        <p class="lead">"Déclarer les cas probables du COVID-19 au Togo!"</p>
                                        <p>- Docmava</p>
                                    </div>
                                </div>
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
@section('script-bottom')
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