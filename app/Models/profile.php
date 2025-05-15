<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class Profile extends Authenticatable implements CanResetPassword
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, CanResetPasswordTrait;

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    protected $table = 'profiles';
   
    protected $fillable = [
        'prenom', 
        'nom', 
        'nom_utilisateur', 
        'email', 
        'password', 
        'telephone', 
        'cellule_preferee', 
        'newsletter', 
        'conditions_acceptees',
    ];
    
    /**
     * Les attributs qui devraient être cachés.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui devraient être castés.
     *
     * @var array
     */
    protected $casts = [
        'newsletter' => 'boolean',
        'conditions_acceptees' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Obtenir le nom complet du profil.
     */
    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    /**
     * Obtenir l'adresse email à utiliser pour la réinitialisation du mot de passe.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Obtenir la clé de route pour la notification de réinitialisation de mot de passe.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'email';
    }
}
