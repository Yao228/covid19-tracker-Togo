<ul class="metismenu" id="menu-bar">
    <li class="menu-title">Navigation</li>

    <li>
        <a href="/">
            <i data-feather="home"></i>
            <span> Tableau de bord </span>
        </a>
    </li>
    <li class="menu-title">Cas probales de covid-19</li>
    <li>
        <a href="/infopatients" aria-expanded="false">
            <i data-feather="users"></i>
            <span>Cas probables</span>
        </a>
    </li>
    @if(auth()->user()->isAdmin())
    <li class="menu-title">PROFESSIONNELS DE SANTE</li>
    <li>
        <a href="/addDoctor" aria-expanded="false">
            <i data-feather="user"></i>
            <span>Les contributeurs</span>
        </a>
    </li> 
    @endif
    <hr>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
            <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
            <span>Déconnexion</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
</ul>
