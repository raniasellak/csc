@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Modifier la formation</h2>

    <form action="{{ route('formations.update', $formation->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- important pour l'update -->
        
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" value="{{ $formation->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $formation->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category" class="form-select" required>
                <option {{ $formation->category == 'CyberSecurity' ? 'selected' : '' }}>CyberSecurity</option>
                <option {{ $formation->category == 'AI' ? 'selected' : '' }}>AI</option>
                <option {{ $formation->category == 'Dev' ? 'selected' : '' }}>Dev</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="formateur_email" class="form-label">Formateur</label>
            <input type="email" class="form-control" name="formateur_email" value="{{ $formation->formateur_email }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" value="{{ $formation->date }}" required>
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" class="form-control">{{ $formation->contenu }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
