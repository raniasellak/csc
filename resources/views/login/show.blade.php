@extends('layouts.master')

@section('title', 'Connexion')

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    
    .text-orange {
        color: #FF9800;
    }
    
    .social-btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    .form-control {
        padding: 0.6rem 1rem;
    }
    
    .form-control:focus {
        border-color: #FF9800;
        box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
    }
    
    .form-check-input:checked {
        background-color: #FF9800;
        border-color: #FF9800;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="{{ asset('images/csc-logo.png') }}" alt="CSC Logo" class="img-fluid" style="max-height: 80px;">
            </div>

            
            
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="text-center mb-3">Connexion</h2>
                    <p class="text-center text-muted mb-4">Accédez à votre espace personnel du Computer Science Club</p>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="text" class="form-control"id="email" type="email" name="email" value="{{ old('email') }}" required >
      @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" type="password" name="password" required >
         @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>
                        
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="text-orange text-decoration-none">Mot de passe oublié?</a>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-orange py-2">Se connecter</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="mb-2">Pas encore de compte? <a href="{{ route('create') }}" class="text-orange text-decoration-none">S'inscrire</a></p>
                        
                        <div class="text-muted mt-3">
                            <p class="small mb-3">ou</p>
                            <div class="d-flex justify-content-center gap-3">
                                
                                <a href="#" class="btn btn-outline-secondary social-btn">
                                    <i class="fab fa-linkdin"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary social-btn">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection