<?php

$page = $_GET['page'] ?? 'accueil';

$pages = [
    'accueil' => 'accueil.php',
    'contact' => 'static/contact.html',
    'login' => 'static/login.html',
    'profil' => 'static/profil.html',
    'accueilUser' => 'static/accueil.html',
];

if (array_key_exists($page, $pages)) {
    include $pages[$page];
} else {
    http_response_code(404);   // Page non trouvée - affiche une erreur 404
    echo "<h1>Erreur 404 : Page non trouvée</h1>";
}

?>