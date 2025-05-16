 <footer class="footer">
        <div class="footer-container">
            <!-- Logo et description -->
            <div class="footer-logo-section">
                <!-- LOGO ICI -->
                <div class="logo">
                    <div class="logo-letter c-letter">C</div>
                    <div class="logo-letter s-letter">S</div>
                    <div class="logo-letter c2-letter">C</div>
                </div>
                <p class="footer-description">
                    Computer Science Club est une association universitaire dédiée à la formation et à l'innovation technologique.
                </p>
                <div class="social-media">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Liens rapides -->
            <div class="footer-links">
                <h3>Liens rapides</h3>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Formations</a></li>
                    <li><a href="#">Cellules</a></li>
                    <li><a href="#">Boutique</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Ressources -->
            <div class="footer-resources">
                <h3>Ressources</h3>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Tutoriels</a></li>
                    <li><a href="#">Projets open source</a></li>
                    <li><a href="#">Vidéothèque</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-contact">
                <h3>Contact</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Université cadi iyyad, marrakech</li>
                    <li><i class="fas fa-envelope"></i> contact@csc-university.ma</li>
                    <li><i class="fas fa-phone"></i> +212 5XX XX XX XX</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>© 2025 Computer Science Club. Tous droits réservés.</p>
           
        </div>
    </footer>

    <style>
        /* Reset et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        /* Style du footer */
        .footer {
            background-color: #1a1a1a;
            color: #fff;
            padding-top: 40px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        /* Logo et description */
        .footer-logo-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Style du logo CSC */
        .logo {
            display: flex;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .logo-letter {
            display: inline-block;
        }

        .c-letter {
            color: #fff;
        }

        .s-letter {
            color: #ff8c00; /* Orange vif */
        }

        .c2-letter {
            color: #fffacd; /* Jaune pâle */
        }

        .footer-description {
            line-height: 1.5;
            margin-bottom: 15px;
            font-size: 14px;
            opacity: 0.8;
        }

        /* Réseaux sociaux */
        .social-media {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            color: #fff;
            background-color: #333;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: #ff8c00;
            transform: translateY(-3px);
        }

        /* Sections liens et ressources */
        .footer-links h3,
        .footer-resources h3,
        .footer-contact h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 18px;
            position: relative;
        }

        .footer-links h3:after,
        .footer-resources h3:after,
        .footer-contact h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 30px;
            height: 2px;
            background-color: #ff8c00;
        }

        .footer-links ul,
        .footer-resources ul,
        .footer-contact ul {
            list-style: none;
        }

        .footer-links li,
        .footer-resources li,
        .footer-contact li {
            margin-bottom: 12px;
        }

        .footer-links a,
        .footer-resources a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }

        .footer-links a:hover,
        .footer-resources a:hover {
            color: #ff8c00;
            transform: translateX(5px);
        }

        /* Section contact */
        .footer-contact ul li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ccc;
        }

        .footer-contact ul li i {
            color: #ff8c00;
            width: 16px;
        }

        /* Copyright et barre du bas */
        .footer-bottom {
            margin-top: 40px;
            padding: 20px;
            border-top: 1px solid #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #ccc;
        }

        .windows-activate {
            text-align: right;
            cursor: pointer;
        }

        .windows-activate span {
            color: #ccc;
        }

        .windows-activate p {
            font-size: 12px;
            opacity: 0.7;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .windows-activate {
                text-align: center;
            }
        }
    </style>
 <script>
        // Mettre à jour l'année du copyright automatiquement
        document.addEventListener('DOMContentLoaded', function() {
            // Mettre à jour l'année du copyright automatiquement si nécessaire
            const yearElement = document.querySelector('.footer-bottom p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.textContent = yearElement.textContent.replace('2025', currentYear);
            }
            
            // Animation pour les liens au survol - effet optionnel
            const links = document.querySelectorAll('.footer-links a, .footer-resources a');
            
            links.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transition = 'all 0.3s ease';
                });
            });
            
            // Fonctionnalité pour la section "Activer Windows" - simulation
            const windowsActivate = document.querySelector('.windows-activate');
            if (windowsActivate) {
                windowsActivate.addEventListener('click', function() {
                    // Simulation - remplacer par le code réel si nécessaire
                    alert('Redirection vers les paramètres d\'activation de Windows');
                    // window.location.href = 'settings-url'; // Décommenter pour une redirection réelle
                });
            }
        });

        // Ajout de l'effet smooth scroll pour les liens internes
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>