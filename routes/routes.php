<?php

$page = $_GET['page'] ?? 'accueil';

$pages = [
    'accueil' => '../views/accueil.php',
    'curivitae' => '../views/templates/cv.html',
    'contact' => '../views/templates/contact.html',
    'login' => '../views/templates/login.html',
    'profil' => '../views/profil.php',
    'accueilUser' => '../views/templates/accueilUser.html',
    'mescv' => '../views/show_cv.php',
];

if (array_key_exists($page, $pages)) {
    include $pages[$page];
} else {
    http_response_code(404);   // Page non trouvée - affiche une erreur 404
    echo "<h1>Erreur 404 : Page non trouvée</h1>";
}

?>