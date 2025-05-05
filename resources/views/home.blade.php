<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Section hero -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1>Bienvenue au Computer Science Club</h1>
                <p class="lead">Rejoignez notre communauté universitaire dédiée à l'informatique, l'IA et la cybersécurité. Développez vos compétences et rencontrez d'autres passionnés.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('formations.index') }}" class="btn btn-light btn-lg">Découvrir nos formations</a>
                    <a href="{{ route('cellules.index') }}" class="btn btn-outline-light btn-lg">Nos cellules</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{ asset('images/hero-image.png') }}" alt="Computer Science Club" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Section formations -->
<section class="home-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nos formations populaires</h2>
        <div class="row">
            @foreach($featuredFormations as $formation)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset($formation['image']) }}" class="card-img-top" alt="{{ $formation['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $formation['title'] }}</h5>
                            <p class="card-text">{{ $formation['description'] }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('formations.show', $formation['id']) }}" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('formations.index') }}" class="btn btn-outline-primary">Voir toutes nos formations</a>
        </div>
    </div>
</section>

<!-- Section cellules -->
<section class="home-section bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Nos cellules spécialisées</h2>
        <div class="row">
            @foreach($cellules as $cellule)
                <div class="col-md-4">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas {{ $cellule['icon'] }}"></i>
                        </div>
                        <h4>{{ $cellule['name'] }}</h4>
                        <p>{{ $cellule['description'] }}</p>
                        <a href="{{ route('cellules.show', $cellule['id']) }}" class="btn btn-sm btn-outline-primary mt-3">Rejoindre la cellule</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('cellules.index') }}" class="btn btn-outline-primary">Découvrir toutes nos cellules</a>
        </div>
    </div>
</section>

<!-- Section Pourquoi nous rejoindre -->
<section class="home-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('images/community.jpg') }}" alt="Notre communauté" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Pourquoi nous rejoindre ?</h2>
                <div class="d-flex mb-4">
                    <div class="me-3 text-primary">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <div>
                        <h4>Apprentissage pratique</h4>
                        <p>Des formations conçues par des professionnels et des étudiants passionnés, avec un focus sur la pratique.</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="me-3 text-primary">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h4>Communauté active</h4>
                        <p>Rejoignez un réseau d'étudiants et de professionnels partageant les mêmes intérêts.</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="me-3 text-primary">
                        <i class="fas fa-laptop-code fa-2x"></i>
                    </div>
                    <div>
                        <h4>Projets concrets</h4>
                        <p>Participez à des projets réels et développez votre portfolio tout en apprenant.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-3 text-primary">
                        <i class="fas fa-briefcase fa-2x"></i>
                    </div>
                    <div>
                        <h4>Opportunités professionnelles</h4>
                        <p>Accédez à des offres de stage et d'emploi grâce à notre réseau d'entreprises partenaires.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section CTA -->
<section class="home-section bg-primary text-white text-center">
    <div class="container">
        <h2 class="mb-4">Prêt à développer vos compétences ?</h2>
        <p class="lead mb-4">Rejoignez notre communauté dès aujourd'hui et commencez votre parcours dans le monde de l'informatique !</p>
        <a href="{{ route('register') }}" class="btn btn-light btn-lg">S'inscrire maintenant</a>
    </div>
</section>
@endsection