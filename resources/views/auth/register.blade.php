<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-white py-3 text-center border-0">
                    <h3 class="mb-0">Créer un compte</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Messages d'erreur -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulaire d'inscription -->
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        
                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            <div class="form-text">Le mot de passe doit contenir au moins 8 caractères.</div>
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <!-- Acceptation des conditions -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                J'accepte les <a href="#" class="text-decoration-none">conditions d'utilisation</a> et la 
                                <a href="#" class="text-decoration-none">politique de confidentialité</a>
                            </label>
                        </div>

                        <!-- Bouton d'inscription -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary py-2">S'inscrire</button>
                        </div>
                    </form>

                    <!-- Lien vers connexion -->
                    <div class="text-center mt-3">
                        <p>
                            Vous avez déjà un compte ? 
                            <a href="{{ route('login') }}" class="text-decoration-none">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Validation côté client avec JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');
        const terms = document.getElementById('terms');
        
        // Vérification du nom
        if (!name.value.trim()) {
            showError(name, 'Le nom est obligatoire');
            isValid = false;
        } else {
            removeError(name);
        }
        
        // Vérification de l'email
        if (!email.value.trim()) {
            showError(email, 'L\'adresse e-mail est obligatoire');
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            showError(email, 'Veuillez entrer une adresse e-mail valide');
            isValid = false;
        } else {
            removeError(email);
        }
        
        // Vérification du mot de passe
        if (!password.value.trim()) {
            showError(password, 'Le mot de passe est obligatoire');
            isValid = false;
        } else if (password.value.length < 8) {
            showError(password, 'Le mot de passe doit contenir au moins 8 caractères');
            isValid = false;
        } else {
            removeError(password);
        }
        
        // Vérification de la confirmation du mot de passe
        if (password.value !== passwordConfirm.value) {
            showError(passwordConfirm, 'Les mots de passe ne correspondent pas');
            isValid = false;
        } else {
            removeError(passwordConfirm);
        }
        
        // Vérification des conditions d'utilisation
        if (!terms.checked) {
            showError(terms, 'Vous devez accepter les conditions d\'utilisation');
            isValid = false;
        } else {
            removeError(terms);
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });
    
    // Fonctions utilitaires pour la validation
    function showError(input, message) {
        const formControl = input.parentElement;
        input.classList.add('is-invalid');
        
        let errorElement = formControl.querySelector('.invalid-feedback');
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'invalid-feedback';
            formControl.appendChild(errorElement);
        }
        
        errorElement.textContent = message;
    }
    
    function removeError(input) {
        input.classList.remove('is-invalid');
        const formControl = input.parentElement;
        const errorElement = formControl.querySelector('.invalid-feedback');
        if (errorElement) {
            formControl.removeChild(errorElement);
        }
    }
    
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
</script>
@endsection