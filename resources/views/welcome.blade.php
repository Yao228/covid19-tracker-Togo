<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Docmava | COVID-19 Togo</title>
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/front.css')}}" />
  <script src="{{ URL::asset('assets/js/front.js') }}"></script>
</head>

<body>

<nav class="uk-navbar-container uk-letter-spacing-small">
  <div class="uk-container">
    <div class="uk-position-z-index" data-uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="/">COVID-19 <span class="uk-visible@m">&nbsp; TOGO</span></a>
    
      </div>
      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav uk-visible@m">
          <li ><a href="/casprobables">Déclarer un cas probable de COVID-19 sans vous s'inscrire</a></li>
        </ul>
        <div class="uk-navbar-item">
          <div><a class="uk-button uk-button-primary" href="/login">Contributeurs</a></div>
        </div>          
        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
          data-uk-navbar-toggle-icon></span></a>
      </div>
    </div>
  </div>
</nav>

<div class="uk-container">
  <div class="uk-border-rounded-large uk-background-top-center uk-background-cover 
    uk-background-norepeat uk-light uk-inline uk-overflow-hidden uk-width-1-1" 
    style="background-image: url({{ URL::asset('images/banner.jpg')}});">
    <div class="uk-position-cover uk-header-overlay"></div>
    <div class="uk-position-relative" data-uk-grid>
      <div class="uk-width-2-3@m uk-flex uk-flex-middle">
        <div class="uk-padding-large uk-padding-remove-right">
          <h1 class="uk-heading-small uk-margin-remove-top">Déclarer les cas probables de COVID-19 !</h1>
          <p class="uk-text-secondary">Cette application a pour but d'aider à une meilleure gestion de la crise sanitaire COVID-19 au Togo, en fournissant une évaluation épidémiologique en temps réel et des conseils ciblés à la population.
            Pour toute information, merci de contacter : Center for Methodology and Modeling N°1218/MATDCL Email: c2m@skml.fr</p>
          <a class="uk-button uk-button-large uk-button-warning" href="/casprobables">Déclarer un cas probable</a>
        </div>
      </div>
      <div class="uk-width-expand@m">
      </div>
    </div>
  </div>
</div>


<div class="uk-section uk-section-default">
  <div class="uk-container">
    <div data-uk-grid>
      <div class="uk-width-expand">
        <h2>S'informer pour mieux se protéger contre le Coronavirus COVID-19</h2>          
      </div>
      
    </div>      
    <div class="uk-child-width-1-2 uk-child-width-1-4@s" data-uk-grid>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="{{ URL::asset('images/ministere-sante-togo.jpg')}}" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Site d'information officiel du Gouvernement</h5>
              <div class="uk-text-xsmall">Ministère de la santé</div>
            </div>
          </div>
          <a href="https://covid19.gouv.tg/" class="uk-position-cover" target="_blanck"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="{{ URL::asset('images/oms-togo.jpg')}}" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">Nouveau coronavirus (COVID-19): conseils au grand public</h5>
              <div class="uk-text-xsmall">OMS</div>
            </div>
          </div>
          <a href="https://www.who.int/fr/emergencies/diseases/novel-coronavirus-2019/advice-for-public" target="_blanck" class="uk-position-cover"></a>
        </div>
      </div> 
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="{{ URL::asset('images/institut-pasteur.jpg')}}" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">MALADIE COVID-19 (NOUVEAU CORONAVIRUS)</h5>
              <div class="uk-text-xsmall">Institut Pasteur</div>
            </div>
          </div>
          <a href="https://www.pasteur.fr/fr/centre-medical/fiches-maladies/coronavirus-wuhan" class="uk-position-cover" target="_blanck"></a>
        </div>
      </div>
      <div>
        <div
          class="uk-card uk-card-video">
          <div class="uk-inline uk-light">
            <img class="uk-border-rounded-large" src="{{ URL::asset('images/oms-togo.jpg')}}" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
            
            <div class="uk-position-small uk-position-bottom-left">
              <h5 class="uk-margin-small-bottom">conseils au grand public - En finir avec les idées reçues</h5>
              <div class="uk-text-xsmall">OMS</div>
            </div>
          </div>
          <a href="https://www.who.int/fr/emergencies/diseases/novel-coronavirus-2019/advice-for-public/myth-busters" target="_blanck" class="uk-position-cover"></a>
        </div>
      </div>    
    </div>
  </div>
</div>

<div class="uk-container">
  <div class="uk-background-primary uk-border-rounded-large uk-light">
    <div class="uk-width-3-4@m uk-margin-auto uk-padding-large">
      <div class="uk-text-center">
        <h2 class="uk-h2 uk-margin-remove">Vous avez remarqué les signes du coronavirus COVID-19 chez l'un de vos proches ou un voisin du quartier. N'hésitez pas à déclarer son cas!</h2>
      </div>
      <div class="uk-margin-medium-top uk-text-center">
        <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true">
            <a class="uk-button uk-button-large uk-button-warning" href="/casprobables">Déclarer son cas maintenant</a>
        </div>
      </div>
    </div>
	</div>
</div>

<footer class="uk-section uk-section-default">
	<div class="uk-container uk-text-secondary uk-text-500">
	
		<div class="uk-margin-medium-top uk-text-small uk-text-muted">				
			<div>Conçu par <a class="uk-link-muted" href="https://docmava.tg/" target="_blank">Docmava</a></div>
		</div>
	</div>
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="/">Covid-19 Togo</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li ><a href="/casprobables">Signaler un cas</a></li>
    </ul>
    <div class="uk-margin-medium-top">
      <a class="uk-button uk-width-1-1 uk-button-primary" href="/register">S'inscrire</a>
    </div>
  </div>
</div>

<script src="//code.jquery.com/jquery.js"></script>
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
</body>
</html>