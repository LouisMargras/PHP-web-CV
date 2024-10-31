<?php

$page = $_GET['page'] ?? 'accueil';

$pages = [
    'accueil' => 'accueil.php',
    'curivitae' => 'static/cv.html',
    'contact' => 'static/contact.html',
    'login' => 'static/login.html',
    'profil' => 'profil.php',
    'accueilUser' => 'static/accueilUser.html',
    'mescv' => 'show_cv.php',
];

if (array_key_exists($page, $pages)) {
    include $pages[$page];
} else {
    http_response_code(404);   // Page non trouvée - affiche une erreur 404
    echo "<h1>Erreur 404 : Page non trouvée</h1>";
}

?>