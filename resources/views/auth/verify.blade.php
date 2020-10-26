@extends('layouts.non-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center  my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez votre adresse e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un lien de vérification à été envoyé à l\'e-mail saisi.') }}
                    </div>
                    @endif

                    {{ __('Avant de se connecter, s\'il vous plaît vérifier votre boîte de réception pour activer votre compte.') }}
                    {{-- {{ __('Si vous n\'avez pas reçu d\'e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour demander un autre.') }}</a>. --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection