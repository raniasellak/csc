@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Nos Formations</h2>

    <!-- Formulaire de filtre par catégorie -->
    <form method="GET" action="{{ route('formations.index') }}" class="mb-4">
        <div class="form-group">
            <label for="category">Filtrer par catégorie :</label>
            <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ $cat == $category ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Affichage des formations -->
    @if($formations->isEmpty())
        <div class="alert alert-warning">
            Aucune formation disponible pour le moment.
        </div>
    @else
        <div class="row">
            @foreach($formations as $formation)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $formation->title }}</h5>
                            <p class="text-muted mb-1"><strong>Catégorie :</strong> {{ $formation->category }}</p>
                            <p><strong>Description :</strong> {{ $formation->description }}</p>
                            <a href="{{ route('formations.show', $formation->id) }}" class="btn btn-primary mt-auto">Voir les détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@endsection
