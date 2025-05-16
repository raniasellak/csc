@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Créer une formation</h2>

    <form action="{{ route('formations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category" class="form-control" required>
                <option value="CyberSecurity">CyberSecurity</option>
                <option value="AI">AI</option>
                <option value="Dev">Dev</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="formateur_email" class="form-label">Email du formateur</label>
            <input type="email" name="formateur_email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="recording" class="form-label">Lien d'enregistrement (optionnel)</label>
            <input type="url" name="recording" class="form-control">
        </div>

        <div class="mb-3">
            <label for="support_course" class="form-label">Support de cours (optionnel)</label>
            <input type="url" name="support_course" class="form-control">
        </div>
        <div class="form-group">
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5" required>{{ old('contenu') }}</textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
