<nav class="navbar navbar-expand-lg">
  <div class="container">
    <!-- Logo CSC -->
    <a class="navbar-brand" href="#">
      <div class="logo-container">
        <span class="logo-letter c-letter">C</span>
        <span class="logo-letter s-letter">S</span>
        <span class="logo-letter c2-letter">C</span>
      </div>
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- Route: accueil -->
          <a class="nav-link" href="{{route('home')}}">Accueil</a>
        </li>
        
        <li class="nav-item">
          <!-- Route: à définir -->
          <a class="nav-link" href="{{ route('formations.index') }}">Formations</a>
        </li>
        <li class="nav-item">
          <!-- Route: à définir -->
          <a class="nav-link" href="profiles.index">Profiles</a>
        </li>
        <li class="nav-item">
          <!-- Route: à définir -->
          <a class="nav-link" href="#">Cellules</a>
        </li>
        <li class="nav-item">
          <!-- Route: à définir -->
          <a class="nav-link" href="#">Boutique</a>
        </li>
        <li class="nav-item">
          <!-- Route: à définir -->
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      
      <div class="d-flex align-items-center">
        @guest
        <!-- Boutons pour visiteurs non connectés -->
        <a href="{{route('login.show')}}" class="btn btn-outline connexion me-2">Connexion</a>
        <a href="{{route('create')}}" class="btn btn-primary inscription">Inscription</a>
        @endguest 
        
        @auth
        <!-- Boutons pour utilisateurs connectés -->
        <a href="{{route('login.logout')}}" class="btn btn-outline connexion me-3">Déconnexion</a>
        
        <!-- Dropdown username -->
        <div class="dropdown">
          <button class="btn dropdown-toggle username-dropdown" type="button" id="dropdownMenuButton" 
                  data-bs-toggle="dropdown" aria-expanded="false">
            @if(Auth::check() && isset(Auth::user()->name))
              {{ Auth::user()->name }}
            @else
              Utilisateur
            @endif
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Mon profil</a></li>
            <li><a class="dropdown-item" href="#">Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('login.logout')}}">Déconnexion</a></li>
          </ul>
        </div>
        @endauth
      </div>
    </div>
  </div>
</nav>

<style>
  /* Styles pour la navbar */
  .navbar {
    background-color: white;
    padding: 0.5rem 1rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  
  /* Style du logo CSC */
  .logo-container {
    display: inline-flex;
    font-size: 2rem;
    font-weight: bold;
    margin-right: 1rem;
  }
  
  .logo-letter {
    display: inline-block;
    width: 30px;
    text-align: center;
  }
  
  .c-letter {
    color: #272727;
  }
  
  .s-letter {
    color: #FE7F02; /* Orange vif comme dans l'image */
    background-color: #FE7F02;
    color: white;
  }
  
  .c2-letter {
    color: #FFD68A; /* Jaune pâle comme dans l'image */
    background-color: #FFD68A;
  }
  
  /* Styles pour les liens de navigation */
  .navbar-nav .nav-link {
    color: #333;
    font-weight: 500;
    padding: 1rem 1.5rem;
    transition: color 0.3s ease;
  }
  
  .navbar-nav .nav-link:hover {
    color: #FE7F02;
  }
  
  /* Styles pour les boutons d'authentification */
  .connexion {
    border: none;
    color: #333;
    font-weight: 500;
  }
  
  .connexion:hover {
    color: #FE7F02;
  }
  
  .inscription {
    background-color: #FE7F02;
    border: none;
    color: white;
    font-weight: 500;
    padding: 0.5rem 1.5rem;
    border-radius: 4px;
  }
  
  .inscription:hover {
    background-color: #e67200;
  }
  
  /* Style pour le dropdown username */
  .username-dropdown {
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 0.5rem 1.5rem;
    font-weight: 500;
  }
  
  .username-dropdown:hover, 
  .username-dropdown:focus {
    background-color: #5a6268;
    color: white;
  }
  
  .dropdown-menu {
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid #eee;
  }
  
  .dropdown-item {
    padding: 0.5rem 1.5rem;
    color: #333;
  }
  
  .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #FE7F02;
  }
  
  /* Media queries pour la responsivité */
  @media (max-width: 992px) {
    .navbar-nav .nav-link {
      padding: 0.5rem 0;
    }
    
    .d-flex {
      flex-direction: column;
      align-items: stretch !important;
      margin-top: 1rem;
    }
    
    .connexion, .inscription, .username-dropdown {
      margin-bottom: 0.5rem;
      text-align: center;
    }
  }
</style>