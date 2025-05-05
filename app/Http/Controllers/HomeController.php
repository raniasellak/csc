<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ici vous pourriez récupérer des données depuis la base de données
        // Par exemple, les formations à la une, les dernières actualités, etc.
        
        // Pour l'exemple, nous créons des données statiques
        $featuredFormations = [
            [
                'id' => 1,
                'title' => 'Introduction à Python',
                'description' => 'Apprenez les bases du langage de programmation Python',
                'image' => 'images/formations/python.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Développement Web avec JavaScript',
                'description' => 'Maîtrisez le développement web moderne avec JavaScript',
                'image' => 'images/formations/javascript.jpg',
            ],
            [
                'id' => 3,
                'title' => 'Cybersécurité pour débutants',
                'description' => 'Découvrez les fondamentaux de la sécurité informatique',
                'image' => 'images/formations/cybersecurity.jpg',
            ],
        ];
        
        // Cellules mises en avant
        $cellules = [
            [
                'id' => 1,
                'name' => 'Intelligence Artificielle',
                'description' => 'Explorez les dernières avancées en IA et machine learning',
                'icon' => 'fa-robot',
            ],
            [
                'id' => 2,
                'name' => 'Développement Web',
                'description' => 'Créez des sites et applications web modernes',
                'icon' => 'fa-code',
            ],
            [
                'id' => 3,
                'name' => 'Cybersécurité',
                'description' => 'Protégez vos systèmes contre les cybermenaces',
                'icon' => 'fa-shield-alt',
            ],
        ];
        
        // Transmettre les données à la vue
        return view('home', compact('featuredFormations', 'cellules'));
    }
}