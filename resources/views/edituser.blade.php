@extends('layouts.vertical')
@section('css')

@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">COVID19 TOGO</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier votre compte</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Mettre à votre compte</h4>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center  my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title mb-4 mt-0">Mettre à jour vos informations</h5>

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#compte" data-toggle="tab" aria-expanded="true"
                                class="nav-link active">
                                <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                                <span class="d-none d-sm-block">Informations</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" data-toggle="tab" aria-expanded="false"
                                class="nav-link">
                                <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                                <span class="d-none d-sm-block">Mot de passe</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content text-muted">
                        <div class="tab-pane  show active" id="compte">
                            <form action="{{ route('edituser.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Votre nom</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" value="{{$user->email}}">
                                </div>
                                @if(!auth()->user()->isPublic())
                                <div class="form-group">
                                    <label for="hopital">Centre de santé</label>
                                    <input type="text" class="form-control" id="hopital" name="hopital" placeholder="Entrez votre centre de santé" value="{{$user->hopital}}">
                                </div>
                                @endif
                                <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="password">
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach 
                            <form action="{{ route('change.password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Mot de passe actuel</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Mot de passe actuel">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe">
                                </div>
                                <div class="form-group">
                                    <label for="hopital">Confirmer le nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="Confirmer le nouveau mot de passe">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Modifier votre mot de passe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
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