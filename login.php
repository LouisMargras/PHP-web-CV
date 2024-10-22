<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    try {
        $db = new PDO('mysql:host=localhost;dbname=CVTHEQUEPHP;charset=utf8', 'rooteur', 'cavapaslatete');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête avec un filtre par username
        $stmt = $db->prepare("SELECT id, password FROM user WHERE username = :username");
        $stmt->execute([':username' => $username]);

        // Récupérer les résultats
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $hashed_password['password'])) {
                // Mot de passe correct, définir la session ou le cookie
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $username; // Sauvegarde du nom d'utilisateur
                header('Location: /accueil'); // Redirection vers la page d'accueil
                exit();
            } else {
                // Mot de passe incorrect
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            // Utilisateur non trouvé
            echo "Utilisateur non trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    // Afficher le formulaire de connexion si la méthode n'est pas POST
    include 'static/login.html';
}
?>
