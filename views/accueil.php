<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
} else {
    $user_name = "Invité"; // Valeur par défaut si l'utilisateur n'est pas connecté
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/style/accueil.css">
</head>
<body>
    <script>
        // Affiche un pop-up de bienvenue
        Swal.fire({
                title: "Good job!",
                text: "User is register !",
                icon: "success"
            });
    </script>

    <div class="switch" style="position: absolute; top: 15px; right: 35px; z-index: 1000;">
        <input type="checkbox" id="btnD" style="width: 100px; height: 50px;">
        <span class="slider"></span>
    </div>

    <!-- Header avec menu de navigation -->
    <header>
        <nav>
            <div class="logo">
                <h1>Mon CV Portfolio</h1>
            </div>
            <div class="links">
                <ul class="nav-links">
                    <li><a href="/accueil">Accueil</a></li>
                    <li><a href="routes.php?page=curivitae">CV</a></li>
                    <li><a href="#projects">Projets</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/profil">Profil</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Section Hero/Bannière -->
    <section class="hero">
        <div class="hero-content">
            <h2>Bienvenue sur mon Portfolio</h2>
            <p>Découvrez mon parcours, mes compétences et mes projets.</p>
            <a href="#projects" class="btn">Voir mes projets</a>
        </div>
    </section>

    <!-- Section Présentation -->
    <section class="about">
        <h2>À propos de moi</h2>
        <p>
            Je suis un développeur web passionné avec une expérience dans la création de sites web dynamiques et interactifs. 
            J'aime relever de nouveaux défis et apporter des solutions innovantes.
        </p>
    </section>

    <!-- Section Projets -->
    <section id="projects" class="projects">
        <h2>Mes Projets</h2>
        <div class="project-grid">
            <div class="project1">
                <img src="../img/projet1.jpg" alt="Projet 1">
                <h3>Projet 1</h3>
                <p>Un projet de développement web pour un client avec des fonctionnalités avancées.</p>
            </div>
            <div class="project2">
                <img src="../img/projet2.jpg" alt="Projet 2">
                <h3>Projet 2</h3>
                <p>Création d'une application mobile pour faciliter la gestion des tâches quotidiennes.</p>
            </div>
            <div class="project3">
                <img src="../img/projet3.jpg" alt="Projet 3">
                <h3>Projet 3</h3>
                <p>Développement d'un site e-commerce complet avec système de paiement intégré.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Mon CV Portfolio. Tous droits réservés.</p>
    </footer>

    <!-- Script pour le Dark Mode -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('btnD');

            if (!toggleButton) {
                console.error('Toggle button not found!');
                return;
            }

            const toggleSpan = document.querySelector('.switch .slider');
            toggleSpan.addEventListener('click', function() {
                toggleButton.checked = !toggleButton.checked; // Change l'état du bouton
                if (toggleButton.checked) {
                    document.body.classList.add('dark-mode');
                } else {
                    document.body.classList.remove('dark-mode');
                }
            });
        });
    </script>
</body>
</html>
