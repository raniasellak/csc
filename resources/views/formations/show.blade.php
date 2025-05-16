@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $formation->title }}</h2>

    <!-- Infos de la formation -->
    <p><strong>Description :</strong> {{ $formation->description }}</p>
    <p><strong>Catégorie :</strong> {{ $formation->category }}</p>
    <p><strong>Formateur :</strong> {{ $formation->formateur_email }}</p>
    <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($formation->date)->format('d/m/Y') }}</p>
    <p><strong>Contenu :</strong> {{ $formation->contenu }}</p>

    @if ($formation->recording)
        <p><strong>Enregistrement :</strong> <a href="{{ $formation->recording }}" target="_blank">Voir l'enregistrement</a></p>
    @endif

    @if ($formation->support_course)
        <p><strong>Support de cours :</strong> <a href="{{ $formation->support_course }}" target="_blank">Voir le support</a></p>
    @endif

    <!-- Bouton suppression -->
    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer cette formation</button>
    </form>

    <a href="{{ route('formations.index') }}" class="btn btn-secondary mt-3">Retour</a>
    <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning mt-2">Modifier</a>

    <!-- Zone d'inscription -->
    <h3 class="mt-4">S'inscrire à cette formation</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($isPassed)
        <div class="alert alert-warning">Cette formation est déjà passée.</div>
    @else
        <form action="{{ route('inscriptions.quick', $formation->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">S'inscrire</button>
        </form>
    @endif

    <!-- Liste des inscrits -->
    @if ($formation->inscriptions->count())
        <h4 class="mt-5">Liste des inscrits</h4>
        <ul class="list-group">
            @foreach ($formation->inscriptions as $inscription)
                <li class="list-group-item">
                  {{ $inscription->profile->nom_complet ?? $inscription->nom }} ({{ $inscription->profile->email ?? $inscription->email }})
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-5">Aucun inscrit pour le moment.</p>
    @endif
</div>
@endsection
