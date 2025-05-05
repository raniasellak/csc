<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Club</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('accueil') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Computer Science Club Logo" height="40">
                </a>
                
                <!-- Bouton hamburger pour mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Menu de navigation -->
                <div class="collapse navbar-collapse" id="navbarMain">
                    <!-- Liens principaux -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('accueil') ? 'active' : '' }}" href="{{ route('accueil') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('formations*') ? 'active' : '' }}" href="{{ route('formations.index') }}">Formations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cellules*') ? 'active' : '' }}" href="{{ route('cellules.index') }}">Cellules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('boutique*') ? 'active' : '' }}" href="{{ route('boutique.index') }}">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    
                    <!-- Boutons d'authentification -->
                    <div class="nav-buttons ms-auto">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Connexion</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
                        @else
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mon profil</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Se déconnecter</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Computer Science Club</h5>
                    <p>Développez vos compétences informatiques et rejoignez notre communauté passionnée.</p>
                </div>
                <div class="col-md-4">
                    <h5>Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('accueil') }}" class="text-white">Accueil</a></li>
                        <li><a href="{{ route('formations.index') }}" class="text-white">Formations</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white">Nous contacter</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Suivez-nous</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">&copy; {{ date('Y') }} Computer Science Club. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>