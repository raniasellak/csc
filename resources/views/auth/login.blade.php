<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-white py-3 text-center border-0">
                    <h3 class="mb-0">Connexion</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Message d'erreur ou de succès -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulaire de connexion -->
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <!-- Bouton de connexion -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2">Se connecter</button>
                        </div>
                    </form>

                    <!-- Liens utiles -->
                    <div class="text-center mt-3">
                        <p class="mb-0">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                Mot de passe oublié ?
                            </a>
                        </p>
                        <p class="mt-3">
                            Vous n'avez pas de compte ? 
                            <a href="{{ route('register') }}" class="text-decoration-none">S'inscrire</a>
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
    const form = document.getElementById('loginForm');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        
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
        } else {
            removeError(password);
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